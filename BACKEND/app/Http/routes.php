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

Route::get('c/{X},{Y},{name}', 'CityBlockHandler@create')
->where(['X' => '[0-9]+','Y' => '[0-9]+']);

