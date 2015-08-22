<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Floor extends Model
{
    //
    protected $fillable = [
    	'BuildingID',
    	'Number',
    	'Floortype',
    	'Built_By',
    	'Owned_By'
    ];

}
