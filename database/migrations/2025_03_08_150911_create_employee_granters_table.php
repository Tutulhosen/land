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
        Schema::create('employee_granters', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('emp_personal_id');
            $table->string('granter_name')->nullable();
            $table->string('granter_occupation')->nullable();
            $table->string('granter_contact_number')->nullable();
            $table->string('granter_relation')->nullable();
            $table->text('granter_address')->nullable();
            $table->string('granter_id_number')->nullable();
            $table->string('granter_id_doc')->nullable();
            $table->timestamps();

            $table->foreign('emp_personal_id')->references('id')->on('employee_personal_information')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_granters');
    }
};
