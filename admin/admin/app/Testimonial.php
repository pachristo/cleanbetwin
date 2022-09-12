<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    //

    protected $table= 'Testimonials';
    protected $fillable=[
        'id', 'user_name', 'image', 'text', 'created_at', 'updated_at','country'
    ];
}
