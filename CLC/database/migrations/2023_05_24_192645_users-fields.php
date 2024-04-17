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
        Schema::table('users', function (Blueprint $table) {
            $table->string('about')->nullable();
            $table->date('birthday')->nullable();
            $table->string('phone')->nullable();
            $table->string('city')->nullable();
            $table->text('social_networks')->nullable();
            $table->string('place_work')->nullable();
            $table->text('portfolio')->nullable();
            $table->string('photo')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['about', 'birthday', 'phone', 'city', 'social_networks', 'place_work', 'portfolio', 'photo']);
        });
    }
};
