<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCityBlockToPlayer extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::table('players', function ($table) {
            $table->integer('cityblock')->unsigned()->nullable();
            $table->foreign('cityblock')->references('id')->on('cities');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('players', function ($table) {
            $table->dropForeign('players_cityblock_foreign');
            $table->dropColumn('cityblock');
        });
    }
}
