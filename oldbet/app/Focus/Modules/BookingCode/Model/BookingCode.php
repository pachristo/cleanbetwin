<?php

namespace App\Focus\Modules\BookingCode\Model;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class BookingCode extends Model
{
    public function yesterdayGame()
    {
        return $this->where('status', '0')->where('codeDate', Carbon::today()->subDay(1)->format('d-m-Y'));
    }

    public function yesterday1Game()
    {
        return $this->where('status', '0')->where('codeDate', Carbon::today()->subDay(2)->format('d-m-Y'));
    }

    public function yesterday2Game()
    {
        return $this->where('status', '0')->where('codeDate', Carbon::today()->subDay(3)->format('d-m-Y'));
    }

    public function todayGame()
    {
        return $this->where('status', '0')->where('codeDate', Carbon::today()->format('d-m-Y'));
    }

    public function today1Game()
    {
        return $this->where('status', '0')->where('codeDate', Carbon::today()->addDay(1)->format('d-m-Y'));
    }

    public function today2Game()
    {
        return $this->where('status', '0')->where('codeDate', Carbon::today()->addDays(2)->format('d-m-Y'));
    }

    public function today3Game()
    {
        return $this->where('status', '0')->where('codeDate', Carbon::today()->addDays(3)->format('d-m-Y'));
    }
}
