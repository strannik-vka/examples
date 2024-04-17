<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMailingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mailings', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('sort')->default(500);
            $table->string('view');
            $table->integer('status_id')->default(0);
            $table->string('users_filter')->nullable();
            $table->foreignId('last_user_id')->nullable();
            $table->integer('count_send')->default(0);
            $table->integer('count_all')->default(0);
            $table->json('email_list')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mailings');
    }
}
