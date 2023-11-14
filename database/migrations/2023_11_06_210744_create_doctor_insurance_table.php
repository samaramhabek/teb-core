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
        Schema::create('doctor_insurance', function (Blueprint $table) {
            $table->id();
            $table->foreignId('insurance_id')->nullable()->constrained('insurances', 'id')->nullOnDelete();
            $table->foreignId('doctor_id')->nullable()->constrained('doctors', 'id')->nullOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doctor_insurances');
    }
};
