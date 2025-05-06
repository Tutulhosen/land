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
        Schema::create('employee_contacts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('emp_personal_id')->constrained('employee_personal_information')->onDelete('cascade');
            $table->string('contact_number')->nullable();
            $table->string('email')->nullable();
            $table->string('whatsapp')->nullable();
            $table->string('pres_add')->nullable();
            $table->boolean('same_address')->default(0);
            $table->string('district')->nullable();
            $table->string('postal_code')->nullable();
            $table->string('permanent_add')->nullable();
            $table->string('permanent_district')->nullable();
            $table->string('permanent_postal_code')->nullable();
            $table->string('emergency_contact_person')->nullable();
            $table->foreignId('relation')->nullable()->constrained('relations', 'id')->onDelete('cascade');
            $table->string('occupation')->nullable();
            $table->string('emergency_contact')->nullable();
            $table->string('emergency_email')->nullable();
            $table->string('emergency_address')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_contacts');
    }
};
