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
        Schema::create('employee_official_information', function (Blueprint $table) {
            $table->id();
            $table->foreignId('emp_personal_id')->constrained('employee_personal_information')->onDelete('cascade');
            $table->foreignId('employee_type')->nullable()->constrained('employee_types')->onDelete('cascade');
            $table->foreignId('department_id')->nullable()->constrained('departments')->onDelete('cascade');
            $table->foreignId('designation_id')->nullable()->constrained('designations')->onDelete('cascade');
            $table->string('branch_id')->nullable();
            $table->foreignId('reporting_to_first')->nullable()->constrained('employee_personal_information')->onDelete('set null');
            $table->foreignId('reporting_to_second')->nullable()->constrained('employee_personal_information')->onDelete('set null');
            $table->foreignId('reporting_to_third')->nullable()->constrained('employee_personal_information')->onDelete('set null');
            $table->string('grade_id')->nullable();
            $table->string('project_id')->nullable();
            $table->date('notice_start_date')->nullable();
            $table->date('notice_end_date')->nullable();
            $table->string('official_phone', 20)->nullable();
            $table->string('official_email')->nullable();
            $table->string('official_whatsapp', 20)->nullable();
            $table->string('user_email')->nullable()->unique();
            $table->string('password')->nullable();
            $table->boolean('login_allowed');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_official_information');
    }
};
