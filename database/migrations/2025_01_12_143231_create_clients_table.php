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
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('salutation')->nullable();
            $table->string('client_name')->nullable();
            $table->string('designation')->nullable();
            $table->string('email')->nullable();
            $table->string('gender')->nullable();
            $table->string('client_type')->nullable();
            $table->string('client_id')->unique()->nullable();
            $table->string('phone')->nullable();
            $table->string('whatsapp')->nullable();
            $table->string('reference')->nullable();
            $table->boolean('status')->default(true);
            $table->string('client_image')->nullable();
            $table->string('business_card')->nullable();
            $table->string('company_name')->nullable();
            $table->string('industry')->nullable();
            $table->string('official_phone')->nullable();
            $table->string('website_url')->nullable();
            $table->text('company_address')->nullable();
            $table->text('billing_address')->nullable();
            $table->string('added_by')->nullable();
            $table->string('company_logo')->nullable();
            $table->string('username')->nullable();
            $table->string('password')->nullable();
            $table->boolean('login_allowed')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
