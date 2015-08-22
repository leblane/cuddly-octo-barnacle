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
        Schema::create('Floors', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('BuildingID');
            $table->integer('Number');
            $table->enum('floortype', ['Home','Work','Tribute','Shop']);
            $table->integer('Built_by')->nullable();
            $table->integer('Owned_by')->nullable();
            $table->integer('Health')->default(100);
            $table->index('Number');
        });

        Schema::table('Floors', function ($table) {
            $table->foreign('BuildingID')->references('id')->on('Buildings');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('Floors');
    }
}
