<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class BackEndHandler extends Controller
{
    public function about()
    {
    	$crap = [
    		'this'=>'is',
    		'not'=>'the',
    		'page' => [ 'you','are','looking',4 ]
    	];

    	return $crap;
    }
}
