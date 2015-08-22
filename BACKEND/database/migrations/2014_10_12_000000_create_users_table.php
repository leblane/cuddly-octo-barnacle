<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('players', function (Blueprint $table) {
            $table->increments('id');
            $table->string('monstername');
            $table->string('login')->unique();
            $table->string('email')->unique();
            $table->string('password', 60);
            $table->integer('cityblock')->nullable();
            $table->integer('respect');
            $table->integer('tribute');
            $table->integer('cash');
            $table->foreign('cityblock')->references('id')->on('cities');
            $table->rememberToken();
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
        Schema::drop('players');
    }
}
