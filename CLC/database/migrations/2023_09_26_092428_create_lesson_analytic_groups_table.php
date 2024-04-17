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
        Schema::create('lesson_analytic_groups', function (Blueprint $table) {
            $table->id();
            $table->foreignId('course_id');
            $table->foreignId('lesson_id');
            $table->integer('users_count');
            $table->integer('views_count');
            $table->integer('answers_count')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lesson_analytic_groups');
    }
};
