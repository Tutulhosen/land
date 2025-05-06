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
        Schema::create('employee_education', function (Blueprint $table) {
            $table->id();
            $table->foreignId('emp_personal_id')->constrained('employee_personal_information')->onDelete('cascade');
            $table->string('education_type')->nullable();
            $table->string('education')->nullable();
            $table->string('group_major_subject')->nullable();
            $table->string('passing_year')->nullable();
            $table->string('institute_name')->nullable();
            $table->string('board_university')->nullable();
            $table->string('result_university')->nullable();
            $table->string('education_doc')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_education');
    }
};
