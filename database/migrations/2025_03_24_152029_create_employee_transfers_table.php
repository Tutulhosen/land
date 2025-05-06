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
        Schema::create('employee_transfers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id')->constrained('employee_personal_information')->onDelete('cascade');
            $table->string('reporting_date')->nullable();
            $table->foreignId('old_branch')->nullable()->constrained('branches')->onDelete('cascade');
            $table->foreignId('old_department')->nullable()->constrained('departments')->onDelete('cascade');
            $table->foreignId('old_designation')->nullable()->constrained('designations')->onDelete('cascade');
            $table->foreignId('old_grade')->nullable()->constrained('grades')->onDelete('cascade');
            $table->foreignId('old_reporting_to_first')->nullable()->constrained('employee_personal_information')->onDelete('set null');
            $table->foreignId('old_reporting_to_second')->nullable()->constrained('employee_personal_information')->onDelete('set null');
            $table->foreignId('old_reporting_to_third')->nullable()->constrained('employee_personal_information')->onDelete('set null');
            $table->foreignId('new_branch')->nullable()->constrained('branches')->onDelete('cascade');
            $table->foreignId('new_department')->nullable()->constrained('departments')->onDelete('cascade');
            $table->foreignId('new_designation')->nullable()->constrained('designations')->onDelete('cascade');
            $table->foreignId('new_grade')->nullable()->constrained('grades')->onDelete('cascade');
            $table->foreignId('new_reporting_to_first')->nullable()->constrained('employee_personal_information')->onDelete('set null');
            $table->foreignId('new_reporting_to_second')->nullable()->constrained('employee_personal_information')->onDelete('set null');
            $table->foreignId('new_reporting_to_third')->nullable()->constrained('employee_personal_information')->onDelete('set null');
            $table->longText('comment')->nullable();
            $table->foreignId('created_by')->nullable()->constrained('users')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_transfers');
    }
};
