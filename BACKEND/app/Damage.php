<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Damage extends Model
{
	protected $fillable = [
		'floor',
		'player',
		'amount'
	]
    //
}
