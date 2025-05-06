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
        Schema::create('official_letters', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employee_id')->nullable(); // Foreign key to employees table
            $table->unsignedBigInteger('letter_type_id'); // Foreign key to letter_types table
            $table->text('content'); // Stores the content of the letter
            $table->unsignedBigInteger('signatory_id'); // Foreign key to employees table
            $table->timestamps();

            $table->foreign('letter_type_id')->references('id')->on('document_templates')->onDelete('cascade');
            $table->foreign('employee_id')->references('id')->on('employee_personal_information')->onDelete('cascade');
            $table->foreign('signatory_id')->references('id')->on('employee_personal_information')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('official_letters');
    }
};
