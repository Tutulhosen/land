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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('project_name');
            $table->unsignedBigInteger('client_id');
            $table->unsignedBigInteger('product_id');
            $table->decimal('project_value', 10, 2)->nullable();
            $table->date('project_start_date')->nullable();
            $table->date('deadline')->nullable();
            $table->date('delivered_date')->nullable();
            $table->string('estimated_hours')->nullable();
            $table->integer('estimated_days')->nullable();
            $table->unsignedBigInteger('project_type_id');
            $table->unsignedBigInteger('industry_id');
            $table->unsignedBigInteger('project_priority_id');
            $table->unsignedBigInteger('project_status_id');
            $table->unsignedBigInteger('project_head_id');
            $table->string('reference')->nullable();
            $table->decimal('sales_commision', 10, 2)->nullable();
            $table->text('clients_requirements')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
