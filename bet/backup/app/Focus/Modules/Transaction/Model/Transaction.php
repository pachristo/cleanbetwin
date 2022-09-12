<?php

namespace App\Focus\Modules\Transaction\Model;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'transactionRef',
        'transactionID',
        'transactionType',
        'userID',
        'planID',
        'subDate',
        'statusCode',
        'amountPaid',
        'ipAddress',
        'authCode'
    ];
}
