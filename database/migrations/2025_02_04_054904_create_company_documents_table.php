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
        Schema::create('company_documents', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_information_id');
            $table->string('letterhead_vertical')->nullable();
            $table->string('invoice_vertical')->nullable();
            $table->string('money_receipt_vertical')->nullable();
            $table->string('letterhead_horizontal')->nullable();
            $table->string('invoice_horizontal')->nullable();
            $table->string('money_receipt_horizontal')->nullable();
            $table->timestamps();

            $table->foreign('company_information_id')->references('id')->on('company_information');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('company_documents');
    }
};
