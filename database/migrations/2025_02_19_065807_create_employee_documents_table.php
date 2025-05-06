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
        Schema::create('employee_documents', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employee_id');
            $table->string('profile_picture')->nullable();
            $table->string('signature')->nullable();
            $table->string('nid_card_front')->nullable();
            $table->string('nid_card_back')->nullable();
            $table->string('cv')->nullable();
            $table->string('trade_licence')->nullable();
            $table->string('vat')->nullable();
            $table->string('tax')->nullable();
            $table->string('gong_picture')->nullable();
            $table->timestamps();
            $table->foreign('employee_id')->references('id')->on('employee_personal_information')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_documents');
    }
};
