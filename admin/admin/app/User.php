<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $dates = [
        'date_subscribed',
        'next_due_date',
        'dateGift'
        ];

    protected $fillable = [
      'full_name',
      'email',
      'phone',
      'username',
      'password',
      'country',
      'sms_due_date',
      'sms_cat',
      'subscription_type',
        'subscription_status',
        'date_subscribed',
        'next_due_date',
        'sub_count'
    ];

    public function queryExpired()
    {
        $affected = User::where('next_due_date', '<', Carbon::now())->where('subscription_status', '1')->update(['subscription_status' => '0']);
        return $affected;
    }

    public function sub()
    {
        return $this->hasOne('App\Subscription', 'id', 'subscription_id');
    }

    public function userSelect($id)
    {
        return $this->find($id);
    }
}
