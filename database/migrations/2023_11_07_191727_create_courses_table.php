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
            // $table->foreignId('category_id')->nullable()->constrained('categories', 'id')->nullOnDelete();
            // $table->foreignId('child_category_id')->nullable()->constrained('categories', 'id')->nullOnDelete();
            $table->string('name');
            $table->string('description')->nullable();
            $table->string('course_files')->nullable();
            $table->integer('course_hours');
            $table->string('video_intro')->nullable();
            $table->foreignId('trainer_id')->nullable()->constrained('doctors', 'id')->nullOnDelete();
            // $table->unsignedBigInteger('user_id')->nullable();
            // $table->foreign('user_id')->references('id')->on('users');
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
