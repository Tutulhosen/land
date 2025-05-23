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
        Schema::create('expenses', function (Blueprint $table) {
            $table->id();
            $table->string('expense_type')->nullable();
            $table->string('account')->nullable();
            $table->date('transaction_date')->nullable();
            $table->decimal('expense_amount', 10, 2)->nullable();
            $table->string('expense_for')->nullable();
            $table->text('description')->nullable();
            $table->string('expense_by')->nullable();
            $table->string('document')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('expenses');
    }
};
