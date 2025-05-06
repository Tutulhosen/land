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
        Schema::create('shifts', function (Blueprint $table) {
            $table->id();
            $table->string('shift_name')->nullable();
            $table->foreignId('shift_type_id')->nullable()->constrained('shift_types')->onDelete('cascade');
            $table->string('start_time')->nullable();
            $table->string('end_time')->nullable();
            $table->time('max_start_time')->nullable();
            $table->time('min_end_time')->nullable();
            $table->string('tot_shift_hour')->nullable();
            $table->text('description')->nullable();
            $table->boolean('send_email')->default(false)->nullable();
            $table->boolean('status')->default(true);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shifts');
    }
};
