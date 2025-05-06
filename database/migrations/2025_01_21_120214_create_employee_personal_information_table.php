<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('employee_personal_information', function (Blueprint $table) {
            $table->id();
            $table->string('emp_id')->unique()->nullable();
            $table->foreignId('salutation')->nullable()->constrained('salutations')->onDelete('cascade');
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->foreignId('gender')->nullable()->constrained('genders')->onDelete('cascade');
            $table->foreignId('religion')->nullable()->constrained('religions')->onDelete('cascade');
            $table->foreignId('nationality')->nullable()->constrained('nationalities')->onDelete('cascade');
            $table->foreignId('blood_group')->nullable()->constrained('blood_groups')->onDelete('cascade');
            $table->string('identification_type')->nullable();
            $table->string('identification_number')->nullable();
            $table->string('dob')->nullable();
            $table->string('fathers_name')->nullable();
            $table->string('mothers_name')->nullable();
            $table->string('marital_status')->nullable();
            $table->string('spouse_name')->nullable();
            $table->string('spouse_occupation')->nullable();
            $table->string('spouse_organization')->nullable();
            $table->string('spouse_mobile')->nullable();
            $table->string('spouse_nid_number')->nullable();
            $table->string('spouse_nid')->nullable();
            $table->string('spouse_dob')->nullable();
            $table->boolean('status')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_personal_information');
    }
};
