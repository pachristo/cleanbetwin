<?php

namespace App\Focus\Modules\SMS\Model;

use Illuminate\Database\Eloquent\Model;

class SMS extends Model
{
    protected $fillable = [
        'phone_number',
        'otp',
        'verify_status',
        'status'
    ];
}
