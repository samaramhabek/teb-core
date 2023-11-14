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
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('description')->nullable();
            $table->string('title')->nullable();
            $table->string('email')->nullable();
            $table->boolean('gender')->nullable();
            $table->foreignId('nationality_id')->nullable()->constrained('nationalities', 'id')->nullOnDelete();
            // $table->foreignId('category_id')->nullable()->constrained('categories', 'id')->nullOnDelete();
            // $table->foreignId('child_category_id')->nullable()->constrained('categories', 'id')->nullOnDelete();
            // $table->foreignId('treatment_id')->nullable()->constrained('treatments', 'id')->nullOnDelete();
            // $table->foreignId('case_id')->nullable()->constrained('cases', 'id')->nullOnDelete();
            // $table->foreignId('insurance_id')->nullable()->constrained('insurances', 'id')->nullOnDelete();
            $table->string('license_certificate_file')->nullable();
            $table->string('university_certificate_file')->nullable();
            $table->string('personal_id_file')->nullable();
            $table->boolean('is_trainer')->nullable()->default('0');
            
            $table->foreignId('city_id')->nullable()->constrained();
            $table->string('region')->nullable();
            $table->string('address')->nullable();
           $table->bigInteger('Phone')->nullable();


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doctors');
    }
};
