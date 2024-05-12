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
        Schema::create('appointment_settings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('doctor_id')->constrained()->onDelete('cascade');
            $table->integer('extension_duration')->nullable();
            $table->dateTime('start_datetime')->nullable();
            // $table->unsignedInteger('start_hour')->nullable();
            // $table->unsignedInteger('end_hour')->nullable();
            $table->boolean('waiting_time_active')->default(false);
            $table->boolean('appointment_notifications')->default(false);
            $table->boolean('rating_message')->default(false);
            $table->boolean('arrival_order')->default(false);
            $table->integer('min_waiting_duration')->nullable();
            $table->integer('max_waiting_duration')->nullable();
            $table->boolean('allow_admin_contact')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointment_settings');
    }
};
