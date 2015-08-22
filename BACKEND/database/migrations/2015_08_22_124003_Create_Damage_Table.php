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
        Schema::create('Damages', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('floor')->unsigned();
            $table->integer('player')->unsigned();
            $table->integer('amount');
        });

        Schema::table('Damages', function ($table) {
            $table->foreign('floor')->references('id')->on('Floors');
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
        Schema::drop('Damages');
    }
}
