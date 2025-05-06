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
        Schema::create('notice_boards', function (Blueprint $table) {
            $table->id();
            $table->date('effective_date')->nullable();
            $table->date('valid_till')->nullable();
            $table->string('title');
            $table->text('details')->nullable();
            $table->string('attachment')->nullable();
            $table->boolean('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notice_boards');
    }
};
