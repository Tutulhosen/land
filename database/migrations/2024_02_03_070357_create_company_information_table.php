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
        Schema::create('company_information', function (Blueprint $table) {
            $table->id();
            $table->string('company_name')->nullable();
            $table->string('address')->nullable();
            $table->unsignedBigInteger('district_id')->nullable();
            $table->unsignedBigInteger('upazila_id')->nullable();
            $table->string('zip_code')->nullable();
            $table->string('timezone')->nullable();
            $table->json('working_days')->nullable();
            $table->string('office_start_time')->nullable();
            $table->string('office_end_time')->nullable();
            $table->string('company_registration_number')->nullable();
            $table->string('trade_license_number')->nullable();
            $table->string('bin_vat_number')->nullable();
            $table->timestamps();

            // Add foreign key constraints
            $table->foreign('district_id')->references('id')->on('districts')->onDelete('cascade');
            $table->foreign('upazila_id')->references('id')->on('upazilas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('company_information');
    }
};
