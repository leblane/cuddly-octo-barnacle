<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDamageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('damages', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('floor')->unsigned();
            $table->integer('player')->unsigned();
            $table->integer('amount');
        });

        Schema::table('damages', function ($table) {
            $table->foreign('floor')->references('id')->on('floors');
            $table->foreign('player')->references('id')->on('players');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('damages');
    }
}
