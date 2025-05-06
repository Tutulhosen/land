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
        Schema::create('employee_references', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('emp_personal_id');
            $table->string('reference_name')->nullable();
            $table->string('reference_occupation')->nullable();
            $table->string('reference_contact_number')->nullable();
            $table->string('reference_relation')->nullable();
            $table->text('reference_address')->nullable();
            $table->string('reference_id_number')->nullable();
            $table->string('reference_id_doc')->nullable();
            $table->timestamps();

            $table->foreign('emp_personal_id')->references('id')->on('employee_personal_information')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_references');
    }
};
