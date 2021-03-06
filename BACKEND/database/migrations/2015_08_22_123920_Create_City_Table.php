<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cityblocks', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('X');
            $table->integer('Y');
            $table->string('name')->unique();
            $table->index('X');
            $table->index('Y');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('cityblocks');
    }
}
