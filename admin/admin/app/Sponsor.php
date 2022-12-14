<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sponsor extends Model
{
    protected $fillable = [
        'sponsorName',
        'sponsorUrl',
        'description',
        'publishStatus',
        'other'
    ];
}
