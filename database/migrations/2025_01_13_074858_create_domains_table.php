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
        Schema::create('domains', function (Blueprint $table) {
            $table->id();
            $table->string('purchase_type')->nullable();
            $table->string('cash_or_bank_account')->nullable();
            $table->date('purchase_date')->nullable();
            $table->string('duration')->nullable();
            $table->decimal('purchase_price', 10, 2)->nullable();
            $table->string('renewal_type')->nullable();
            $table->string('purchase_from')->nullable();
            $table->decimal('renewal_price', 10, 2)->nullable();
            $table->date('next_renewal_date')->nullable();
            $table->string('purchase_for')->nullable();
            $table->string('client_or_owner')->nullable();
            $table->string('purchase_by')->nullable();
            $table->string('invoice')->nullable();
            $table->string('domain_name')->nullable();
            $table->string('currency')->nullable();
            $table->decimal('currency_amount', 10, 2)->nullable();
            $table->integer('quantity')->nullable();
            $table->string('currency_rate')->nullable();
            $table->decimal('total_amount', 10, 2)->nullable();
            $table->string('vat_tax')->nullable();
            $table->decimal('discount', 10, 2)->nullable();
            $table->string('client_id')->nullable();
            $table->string('client_name')->nullable();
            $table->string('designation')->nullable();
            $table->string('company_name')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->text('company_address')->nullable();
            $table->string('town_city')->nullable();
            $table->string('district')->nullable();
            $table->string('zip_code')->nullable();
            $table->string('nid_number')->nullable();
            $table->string('nid_front')->nullable();
            $table->string('nid_back')->nullable();
            $table->string('trade_license')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('domains');
    }
};
