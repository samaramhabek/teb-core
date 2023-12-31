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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->nullable()->constrained('categories', 'id')->nullOnDelete();
            $table->foreignId('child_category_id')->nullable()->constrained('categories', 'id')->nullOnDelete();
            $table->string('category_text')->nullable();
            $table->boolean('online')->default(1);
            $table->string('name');
            $table->string('description')->nullable();
            $table->integer('hours')->nullable();
            $table->integer('exam_duration')->nullable();
            $table->foreignId('trainer_id')->nullable()->constrained('doctors', 'id')->nullOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
