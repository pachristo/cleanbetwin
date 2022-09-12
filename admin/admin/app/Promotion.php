<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
 
    protected $table = "promotions";
    protected $fillable = [
        'id', 'image', 'link', 'status', 'created_at', 'updated_at'
    ];
}
