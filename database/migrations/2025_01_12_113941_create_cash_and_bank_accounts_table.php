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
        Schema::create('cash_and_bank_accounts', function (Blueprint $table) {
            $table->id();
            $table->string('cash_or_bank_account_name')->nullable();
            $table->string('account_type')->nullable();
            $table->string('bank_name')->nullable();
            $table->string('account_number')->nullable();
            $table->string('bank_account_type')->nullable();
            $table->string('branch_name')->nullable();
            $table->string('account_holder_name')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->date('opening_date')->nullable();
            $table->decimal('opening_balance', 15, 2)->nullable();
            $table->decimal('current_balance', 15, 2)->nullable();
            $table->string('bank_logo')->nullable();
            $table->boolean('status')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cash_and_bank_accounts');
    }
};
