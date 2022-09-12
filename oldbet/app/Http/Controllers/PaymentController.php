<?php

namespace App\Http\Controllers;

use App\Focus\Modules\Subscription\Model\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PaymentController extends Controller
{
    public $sub;
    public function __construct(Subscription $subscription)
    {
        $this->sub = $subscription;
    }

    public function getPayment($category = null, $plan = null, Request $request)
    {
        Session::put('subRoute', $request->url());

        if (currentUser()->country=='') {
            return redirect('/country');
        }

        $sub = $this->sub->findSub($category, $plan);

        if (currentUser()->subscription_status=='1') {
            $request->session()->flash("error", "YOU HAVE AN ACTIVE SUBSCRIPTION <strong>WE DO NOT CURRENTLY SUPPORT DOUBLE-SUBSCRIPTION</strong>");
            return redirect()->route('/app/index');
        }

        if ($sub) return view('pay', compact('sub'));
        return redirect()->route('/vip_packages');
    }
}
