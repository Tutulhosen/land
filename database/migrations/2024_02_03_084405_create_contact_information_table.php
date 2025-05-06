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
        Schema::create('contact_information', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_information_id');

            $table->string('official_contact_number')->nullable();
            $table->string('whatsapp_number')->nullable();
            $table->string('landline_number')->nullable();
            $table->string('hotline_number')->nullable();
            $table->string('email_address')->nullable();
            $table->string('website_address')->nullable();
            $table->text('google_map_iframe')->nullable();
            $table->timestamps();

            $table->foreign('company_information_id')->references('id')->on('company_information');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contact_information');
    }
};
