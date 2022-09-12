<?php

namespace App\Focus\Modules\Subscription\Model;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    public function findSub($category = null, $plan = null)
    {
        return $this->where('category', $category)->where('planName', $plan)->first();
    }
}
