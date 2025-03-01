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
            $table->string('name',255);
            $table->text('description');
            $table->integer('price');
            $table->date('start_date');
            $table->date('end_date');
            $table->foreignId('teacher_id')->constrained('teachers');
            $table->foreignId('course_family_id')->constrained('course_families');
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
