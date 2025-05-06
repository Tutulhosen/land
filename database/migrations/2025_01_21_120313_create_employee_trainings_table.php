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
        Schema::create('employee_trainings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('emp_personal_id')->constrained('employee_personal_information')->onDelete('cascade');
            $table->string('train_type')->nullable();
            $table->string('course_title')->nullable();
            $table->text('description')->nullable();
            $table->string('course_duration')->nullable();
            $table->date('course_start')->nullable();
            $table->date('course_end')->nullable();
            $table->string('year')->nullable();
            $table->string('institute_name')->nullable();
            $table->string('institute_address')->nullable();
            $table->string('resource')->nullable();
            $table->string('result')->nullable();
            $table->string('training_doc')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_trainings');
    }
};
