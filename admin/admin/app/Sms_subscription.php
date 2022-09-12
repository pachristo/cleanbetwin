<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sms_subscription extends Model
{
    
    protected $table='sms_subcriptions';

    protected $fillable=[
    	 'planName',
         'category',
         'duration',
         'nairaPrice',
         'keshPrice',
         'ugxPrice',
         'tzsPrice',
         'cedPrice',
         'dollarPrice',
         'planBenefits',




    ];
}
