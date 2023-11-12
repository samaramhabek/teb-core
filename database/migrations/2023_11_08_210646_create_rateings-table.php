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
    {  Schema::create('course_ratings', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('course_id');
        $table->decimal('rating_percentage', 5, 2);
        $table->text('note')->nullable();
        $table->timestamps();

        $table->foreign('course_id')->references('id')->on('courses');
    });
    
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doctor_cases');
    }
};
