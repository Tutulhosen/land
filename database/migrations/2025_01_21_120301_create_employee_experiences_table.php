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
        Schema::create('employee_experiences', function (Blueprint $table) {
            $table->id();
            $table->foreignId('emp_personal_id')->constrained('employee_personal_information')->onDelete('cascade');
            $table->string('company_name')->nullable();
            $table->string('job_position')->nullable();
            $table->string('department')->nullable();
            $table->text('job_respons')->nullable();
            $table->date('from_date')->nullable();
            $table->date('to_date')->nullable();
            $table->string('duration')->nullable();
            $table->string('projects')->nullable();
            $table->string('years_of_experience')->nullable();
            $table->string('experiance_doc')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_experiences');
    }
};
