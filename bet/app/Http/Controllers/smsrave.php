<?php

namespace App\Http\Controllers;

use App\sms_subcription;
use App\Focus\Modules\Transaction\Model\Transaction;
use App\Focus\Modules\User\Model\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use DateTime;
use App\sms_transaction;

class smsrave extends Controller
{
    public function getFinish($id=null, $txRef=null, sms_transaction $transaction)
    {
        return redirect('/');
        $sub = sms_subcription::where('id',$id)->first();
        //$sub =$sub[0];
        $date = new DateTime();
        //  DEFAULT
        $today = $date->format('Y-m-d H:i:s');
        $nextdue = date('Y-m-d H:i:s', strtotime('+'.$sub->duration));
        //die($nextdue);

        $data = array('txref' => $txRef,
            'SECKEY' => 'FLWSECK-14208e2e22da921bb0d5008f946722e3-X' //secret key from pay button generated on rave dashboard
        );



        // make request to endpoint using unirest.
        $headers = array('Content-Type' => 'application/json');
        $body = \Unirest\Request\Body::json($data);
        $url = "https://api.ravepay.co/flwv3-pug/getpaidx/api/v2/verify"; //please make sure to change this to production url when you go live

// Make `POST` request and handle response with unirest
        $response = \Unirest\Request::post($url, $headers, $body);
       	//dd($response);
        //check the status is success
        if ($response->body->data->status === "successful" && $response->body->data->chargecode === "00") {
// echo("Give value");

            $user = User::find(currentUser()->id);

            $confirm = $transaction->where('transactionRef', $txRef)->where('userID', currentUser()->id)->first();
//             if ($user->subscription_status=='1' || isset($confirm))
//             {
//                 session()->flash('success', 'YOUR ACCOUNT HAS BEEN PREVIOUSLY UPGRADED! THANKS.');
//                 return redirect('/portal/home');
// //                $next = strtotime('+'.$sub->accessTime, strtotime(currentUser()->next_due_date));
// //                $nextdue = date("Y-m-d H:i:s", $next);
//             }

            User::where('id', currentUser()->id)->update(['sms_status'=>'1', 'sms_cat'=>$sub->category,'sms_subscribed_date'=>Carbon::now()->format('Y-m-d H:i:s'), 'sms_due_date'=>$nextdue]);
            //User::where('id', currentUser()->id)->increment('sub_count');

            $transaction->create(['transactionRef'=>$response->body->data->txref, 'transactionID'=>$response->body->data->txid, 'transactionType'=>'SMS Subscription', 'userID'=>currentUser()->id, 'planID'=>$sub->id, 'subDate'=>$today, 'statusCode'=>$response->body->data->status, 'amountPaid'=>$sub->keshPrice]);

            session()->flash('success', 'PAYMENT COMPLETED! YOUR ACCOUNT HAS BEEN ACTIVATED');
            return redirect('/app/sms_campaign');
        }
        session()->flash('error', 'TRANSACTION WAS NOT SUCCESSFUL');
        return redirect('/app/sms_campaign');
    }
}
