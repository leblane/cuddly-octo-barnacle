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
            $table->integer('floor');
            $table->integer('player');
            $table->integer('amount');
            $table->foreign('floor')->references('id')->on('Floor');
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
