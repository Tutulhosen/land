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
        Schema::create('brand_settings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_information_id');
            $table->string('main_logo')->nullable();
            $table->string('alternative_logo')->nullable();
            $table->string('favicon')->nullable();
            $table->timestamps();

            $table->foreign('company_information_id')->references('id')->on('company_information');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('brand_settings');
    }
};
