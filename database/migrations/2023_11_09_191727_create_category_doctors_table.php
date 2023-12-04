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
        Schema::create('category_doctors', function (Blueprint $table) {
            $table->id();
          
            
            $table->foreignId('category_id')->nullable()->constrained('categories', 'id')->nullOnDelete();
            $table->foreignId('child_category_id')->nullable()->constrained('categories', 'id')->nullOnDelete();
        
            $table->foreignId('doctor_id')->nullable()->constrained('doctors', 'id')->nullOnDelete();
            $table->boolean('for_article')->default(0);
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
