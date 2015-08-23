<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('about', 'StaticPageHandler@about');
Route::get('be/about', 'BackEndHandler@about');

Route::post('cityutil/makeblock', 'CityBlockHandler@create');
Route::post('cityutil/cityinit', 'CityBlockHandler@makeInitialCityBlock');

Route::post('block','CityBlockHandler@show');
Route::post('block/all','CityBlockHandler@dump');
Route::post('block/grid','CityBlockHandler@dumpgrid');

Route::post('floor','FloorHandler@show');

Route::post('building','BuildingHandler@show');


