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

Route::post('city/makeblock', 'CityBlockHandler@create');
Route::post('city/cityinit', 'CityBlockHandler@makeInitialCityBlock');
Route::post('city/{id}','CityBlockHandler@show');
Route::post('city/all/{id}','CityBlockHandler@dump');

Route::post('floor/{id}','FloorHandler@show');

Route::post('building/{id}','BuildingHandler@show');


