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
        Schema::create('email_settings', function (Blueprint $table) {
            $table->id();
            $table->string('mailDriver')->nullable();
            $table->string('mailHost')->nullable();
            $table->string('mailPort')->nullable();
            $table->string('mailUsername')->nullable();
            $table->string('mailPassword')->nullable();
            $table->string('mailEncryption')->nullable();
            $table->string('mailFromEmail')->nullable();
            $table->string('mailFromName')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('email_settings');
    }
};
