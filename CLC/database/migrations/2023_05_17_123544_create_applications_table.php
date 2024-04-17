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
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('juridical_status')->nullable();
            $table->json('activity_spheres')->nullable();
            $table->string('website')->nullable();
            $table->string('fio')->nullable();
            $table->date('birthday')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('social_network')->nullable();
            $table->string('region')->nullable();
            $table->string('city')->nullable();
            $table->text('portfolio')->nullable();
            $table->text('about_team')->nullable();
            $table->text('motivation')->nullable();
            $table->text('video')->nullable();
            $table->text('portfolio_team')->nullable();
            $table->foreignId('user_id')->nullable();
            $table->integer('status_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applications');
    }
};
