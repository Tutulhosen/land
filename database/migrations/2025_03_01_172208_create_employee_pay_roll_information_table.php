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
        Schema::create('employee_pay_roll_information', function (Blueprint $table) {
            $table->id();
            $table->foreignId('emp_personal_id')->constrained('employee_personal_information')->onDelete('cascade');
            $table->foreignId('holiday_id')->nullable()->constrained('week_offs')->onDelete('set null');
            $table->foreignId('shift_id')->nullable()->constrained('shifts')->onDelete('set null');
            $table->boolean('overtime_enable')->nullable();
            $table->string('sallery_payment_by')->nullable();
            $table->string('bank_name', 255)->nullable();
            $table->string('account_holder_name', 255)->nullable();
            $table->string('branch_name', 255)->nullable();
            $table->string('account_number', 255)->nullable();
            $table->string('tin_number', 255)->nullable();
            $table->date('joining_date')->nullable();
            $table->string('joining_sallery', 255)->nullable();
            $table->string('probation_period')->nullable();
            $table->date('probation_period_starting_date')->nullable();
            $table->date('probation_period_end_date')->nullable();
            $table->string('salary_type', 255)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_pay_roll_information');
    }
};
