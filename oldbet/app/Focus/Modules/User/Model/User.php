<?php

namespace App\Focus\Modules\User\Model;

use App\Focus\Modules\Subscription\Model\Subscription;
use Cartalyst\Sentinel\Users\EloquentUser;
use Illuminate\Database\Eloquent\Model;

class User extends EloquentUser
{
    protected $fillable = [
        'full_name',
        'sms_status',
        'sms_subscribed_date',
        'sms_due_date',
        'phone_status',
        'email',
        'phone',
        'username',
        'country',
        'state',
        'password'
    ];

    protected $loginNames = ['email', 'phone'];

    public function sub()
    {
        return $this->hasOne(Subscription::class, 'id', 'subscription_id');
    }
}
