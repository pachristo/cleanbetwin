<?php

namespace App\Http\Controllers;

use App\Focus\Modules\Subscription\Model\Subscription;
use App\Focus\Modules\Transaction\Model\Transaction;
use App\Focus\Modules\User\Model\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use DateTime;

class RavesController extends Controller
{
    public function getFinish($id=null, $txRef=null, Transaction $transaction)
    {
        //test secret key FLWSECK_TEST-b6dc82c631cc2cb8adb5e2f8e0d2be89-X
        // real key  FLWSECK-14208e2e22da921bb0d5008f946722e3-X
        $sub = Subscription::find($id);
        $date = new DateTime();
        //  DEFAULT
        $today = $date->format('Y-m-d H:i:s');
        $nextdue = date('Y-m-d H:i:s', strtotime('+'.$sub->accessTime));

        $data = array('txref' => $txRef,
            'SECKEY' => 'FLWSECK_TEST-b6dc82c631cc2cb8adb5e2f8e0d2be89-X' //secret key from pay button generated on rave dashboard
        );



        // make request to endpoint using unirest.
        $headers = array('Content-Type' => 'application/json');
        $body = \Unirest\Request\Body::json($data);
        $url = "https://api.ravepay.co/flwv3-pug/getpaidx/api/v2/verify"; //please make sure to change this to production url when you go live

// Make `POST` request and handle response with unirest
        $response = \Unirest\Request::post($url, $headers, $body);
//        dd($response);
        //check the status is success
        if ($response->body->data->status === "successful" && $response->body->data->chargecode === "00") {
// echo("Give value");

            $user = User::find(currentUser()->id);

            $confirm = $transaction->where('transactionRef', $txRef)->where('userID', currentUser()->id)->first();
            if ($user->subscription_status=='1' || isset($confirm))
            {
                session()->flash('success', 'YOUR ACCOUNT HAS BEEN PREVIOUSLY UPGRADED! THANKS.');
                return redirect('/app/index');
//                $next = strtotime('+'.$sub->accessTime, strtotime(currentUser()->next_due_date));
//                $nextdue = date("Y-m-d H:i:s", $next);
            }

            User::where('id', currentUser()->id)->update(['subscription_id'=>$sub->id, 'subscription_type'=>$sub->planName, 'subscription_status'=>'1', 'date_subscribed'=>Carbon::now()->format('Y-m-d H:i:s'), 'next_due_date'=>$nextdue]);
            User::where('id', currentUser()->id)->increment('sub_count');

            $transaction->create(['transactionRef'=>$response->body->data->txref, 'transactionID'=>$response->body->data->txid, 'transactionType'=>'Subscription', 'userID'=>currentUser()->id, 'planID'=>$id, 'subDate'=>$today, 'statusCode'=>$response->body->data->status, 'amountPaid'=>$sub->keshPrice]);

            session()->flash('success', 'PAYMENT COMPLETED! YOUR ACCOUNT HAS BEEN UPGRADED');
            return redirect('/app/index');
        }
        session()->flash('error', 'TRANSACTION WAS NOT SUCCESSFUL');
        return redirect()->route('/vip_packages');
    }
}
