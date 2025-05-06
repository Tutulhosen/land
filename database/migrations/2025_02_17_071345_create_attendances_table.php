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
        Schema::create('attendances', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id')->constrained('employee_personal_information')->onDelete('cascade');
            $table->foreignId('shift_id')->nullable()->constrained('shifts')->onDelete('set null');
            $table->date('date');
            $table->time('check_in')->nullable();
            $table->time('check_out')->nullable();
            $table->time('break_start')->nullable();
            $table->time('break_end')->nullable();
            $table->time('overtime_start')->nullable();
            $table->time('overtime_end')->nullable();
            $table->integer('early_leave')->nullable();
            $table->integer('late')->nullable();
            $table->decimal('total_hours', 5, 2)->nullable();
            $table->decimal('overtime_hours', 5, 2)->nullable();
            $table->enum('status', ['Present', 'Absent', 'Late', 'Half-day', 'Leave','Overtime','Early Leave'])->default('Absent');
            $table->enum('leave_type', ['Sick', 'Casual', 'Annual', 'Unpaid', 'Maternity', 'Other'])->nullable();
            $table->decimal('latitude', 10, 7)->nullable();
            $table->decimal('longitude', 10, 7)->nullable();
            $table->string('device_id')->nullable(); // If using biometric or RFID device
            $table->text('notes')->nullable();
            $table->ipAddress('ip_address')->nullable();
            $table->foreignId('created_by')->nullable()->constrained('users')->onDelete('cascade');
            $table->foreignId('updated_by')->nullable()->constrained('users')->onDelete('cascade');
            $table->foreignId('deleted_by')->nullable()->constrained('users')->onDelete('cascade');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attendances');
    }
};
