<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
   protected $fillable=[
   	'ads_image', 'position', 'location', 'page', 'website', 'country', 'description', 'status', 'other'
   ];
}



