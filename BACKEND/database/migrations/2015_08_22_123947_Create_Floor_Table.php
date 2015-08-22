<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFloorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('floors', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('BuildingID')->unsigned();
            $table->integer('Number');
            $table->enum('floortype', ['Home','Work','Tribute','Shop']);
            $table->integer('Built_by')->unsigned()->nullable();
            $table->integer('Owned_by')->unsigned()->nullable();
            $table->integer('Health')->default(100);
            $table->index('Number');
        });

        Schema::table('floors', function ($table) {
            $table->foreign('BuildingID')->references('id')->on('buildings');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('floors');
    }
}
