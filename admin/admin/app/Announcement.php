<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{

	protected $fillable=[
		'type','body','country'
	];
    
}
