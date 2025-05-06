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
        Schema::create('branch_assignments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('child_id');
            $table->unsignedBigInteger('parent_id');
            $table->timestamps();

            $table->foreign('child_id')->references('id')->on('branches')->onDelete('cascade');
            $table->foreign('parent_id')->references('id')->on('branches')->onDelete('cascade');

            $table->unique(['child_id', 'parent_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('branch_assignments');
    }
};
