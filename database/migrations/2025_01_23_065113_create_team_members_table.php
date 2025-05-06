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
        Schema::create('team_members', function (Blueprint $table) {
            $table->id();
            $table->string('member_type')->nullable();

            $table->unsignedBigInteger('employee_id')->nullable();
            $table->foreign('employee_id')->references('id')->on('employee_personal_information')->nullOnDelete();
            $table->string('salutation')->nullable();
            $table->string('team_member_name')->nullable();
            $table->string('member_id')->unique()->nullable();
            $table->string('designation')->nullable();
            $table->string('department')->nullable();
            $table->string('reporting_to')->nullable();
            $table->string('gender')->nullable();
            $table->string('created_by')->nullable();
            $table->date('created_on')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('whatsapp')->nullable();
            $table->string('email_address')->nullable();
            $table->string('facebook')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('github')->nullable();
            $table->string('member_image')->nullable();
            $table->boolean('status')->nullable();
            $table->boolean('login_allowed')->nullable();
            $table->string('login_url')->nullable();
            $table->string('username')->nullable();
            $table->string('password')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('team_members');
    }
};
