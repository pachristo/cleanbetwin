<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookingCode extends Model
{
    protected $fillable = [
        'codeDate',
        'VIPCategory',
        'bookMaker',
        'bookingCode',
        'totalOdds',
        'totalGames',
        'codeStatus',
        'status',
    ];

    public function getGames($date)
    {
        return $this->where('codeDate', $date)->get();
    }
}
