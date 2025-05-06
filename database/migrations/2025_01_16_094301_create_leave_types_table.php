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
        Schema::create('leave_types', function (Blueprint $table) {
            $table->id();
            $table->string('leave_name')->nullable();
            $table->foreignId('leave_duration_id')->nullable()->constrained('leave_durations')->onDelete('restrict');
            $table->integer('leave_days')->nullable();
            $table->string('available_for')->nullable();
            $table->foreignId('gender_id')->nullable()->constrained('genders')->onDelete('restrict');
            $table->foreignId('religion_id')->nullable()->constrained('religions')->onDelete('restrict');
            $table->string('available_from')->nullable();
            $table->string('applicable_after')->nullable();
            $table->string('allocation_method')->nullable();
            $table->foreignId('notification_period_id')->nullable()->constrained('notification_periods')->onDelete('restrict');
            $table->foreignId('carry_forward_limit_id')->nullable()->constrained('carry_forward_limits')->onDelete('restrict');
            $table->boolean('send_email')->nullable();
            $table->string('created_by')->nullable();
            $table->boolean('status')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leave_types');
    }
};
