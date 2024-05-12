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
        Schema::create('doctor_general_settings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('doctor_id')->constrained()->onDelete('cascade');
            $table->string('email')->unique();
            $table->string('password');
            $table->unsignedSmallInteger('session_duration')->default(60); // Duration in minutes
            $table->string('currency')->nullable(); // Assuming you have a separate table for currencies
            $table->boolean('settings_enabled')->default(true); // To allow/disallow editing of doctor's settings
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doctor_general_settings');
    }
};
