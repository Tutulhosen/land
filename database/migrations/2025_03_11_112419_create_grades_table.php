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
        Schema::create('grades', function (Blueprint $table) {
            $table->id();
            $table->foreignId('designation_id')->constrained('designations');
            $table->string('name')->nullable();
            $table->decimal('basic_salary')->nullable();
            $table->decimal('house_rent')->nullable();
            $table->decimal('medical_allowance')->nullable();
            $table->decimal('transport_allowance')->nullable();
            $table->decimal('other_allowance')->nullable();
            $table->decimal('provident_fund')->nullable();
            $table->decimal('tax_deduction')->nullable();
            $table->string('incrementType')->nullable();
            $table->string('percentage')->nullable();
            $table->string('amount')->nullable();
            $table->boolean('status')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('grades');
    }
};
