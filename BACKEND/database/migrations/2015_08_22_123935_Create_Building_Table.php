<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBuildingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Buildings', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('CityBlock')->unsigned();

        });

        Schema::table('Buildings', function ($table) {
            $table->foreign('CityBlock')->references('id')->on('Cities')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('Buildings');
    }
}
