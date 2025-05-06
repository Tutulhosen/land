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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_category_id');
            $table->string('product_name');
            $table->string('version');
            $table->string('websiteurl')->nullable();
            $table->string('demourl')->nullable();
            $table->string('main_project_file')->nullable();
            $table->string('main_database_file')->nullable();
            $table->string('main_frontend_file')->nullable();
            $table->timestamps();

            // $table->foreign('product_category_id')->references('id')->on('product_categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
