<?php

namespace App\Http\Controllers;

use App\Focus\Modules\Subscription\Model\Subscription;
use App\Focus\Modules\Transaction\Model\Transaction;
use App\Focus\Modules\User\Model\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use DateTime;

class PaystackController extends Controller
{
    public function getPaymentStatus($subID, $code, Transaction $transaction)
    {
        // Get the payment ID before session clear
        $user = currentUser();
        $sub = Subscription::find($subID);

        $date = new DateTime();

        //  DEFAULT
        $today = $date->format('Y-m-d H:i:s');
        $nextdue = date('Y-m-d H:i:s', strtotime('+'.$sub->accessTime));

        $result = array();
        //sk_live_abad2632da057de41bd9eb39a9528c0859a0ac87
        //The parameter after verify/ is the transaction reference to be verified
        $url = "https://api.paystack.co/transaction/verify/$code";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt(
            $ch, CURLOPT_HTTPHEADER, [
                'Authorization: Bearer sk_live_abad2632da057de41bd9eb39a9528c0859a0ac87 '
            ]
        );
        $request = curl_exec($ch);

        curl_close($ch);

        if ($request) {
            $result = json_decode($request, true);
        }
        if (array_key_exists('data', $result) && array_key_exists('status', $result['data']) && ($result['data']['status'] === 'success')) {
            if (currentUser()->subscription_status=='1')
            {
                $next = strtotime('+'.$sub->accessTime, strtotime(currentUser()->next_due_date));
                $nextdue = date("Y-m-d H:i:s", $next);
            }
            User::where('id', currentUser()->id)->update(['subscription_id'=>$sub->id, 'subscription_type'=>$sub->planName, 'subscription_status'=>'1', 'date_subscribed'=>Carbon::now()->format('Y-m-d H:i:s'), 'next_due_date'=>$nextdue]);
            User::where('id', currentUser()->id)->increment('sub_count');

            $transaction->create(['transactionRef'=>$result['data']['reference'], 'transactionID'=>$result['data']['id'], 'transactionType'=>'Subscription', 'userID'=>currentUser()->id, 'planID'=>$subID, 'subDate'=>$today, 'statusCode'=>$result['data']['status'], 'amountPaid'=>$sub->nairaPrice]);

            session()->flash('success', 'PAYMENT COMPLETED! YOUR ACCOUNT HAS BEEN UPGRADED');
            return redirect()->route('/app/index');
        }else{
            session()->flash('error', 'TRANSACTION WAS NOT SUCCESSFUL');
            return redirect()->route('/vip_packages');
        }
    }
}
