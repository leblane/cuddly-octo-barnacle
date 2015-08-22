<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class StaticPageHandler extends Controller
{
	public function about()
	{
		$stuff = [
			'Authors'=>['Leblane','Truck'],
			'Game_Name'=>'Cuddly Monster Octo Game Tentacle Thing'
		];
		return view('static.about',compact('stuff'));
	}
    //
}
