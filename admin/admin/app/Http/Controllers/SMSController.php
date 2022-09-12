<?php

namespace App\Http\Controllers;

use App\ResponseFacade;
use App\SMS;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Session;
use Twilio\Rest\Client;

class SMSController extends Controller
{
    public function getSend()
    {
        $phones = SMS::whereVerifyStatus('1')->get(['phone_number']);
        $bulk = $phones->implode('phone_number', ', ');
        return view('sms', compact('bulk'));
    }

    public function postSend(Request $request)
    {
        $data = $request->except('_token');

        $message = $data['message'];

        $phones = SMS::whereVerifyStatus('1')->get();
        foreach ($phones as $to)
        {
            $account_sid = env("TWILIO_SID");
            $auth_token = env("TWILIO_AUTH_TOKEN");
            $twilio_number = env("TWILIO_NUMBER");
            $client = new Client($account_sid, $auth_token);
            $client->messages->create($to->phone_number,
                ['from' => $twilio_number, 'body' => $message] );
        }

        ResponseFacade::validationMessage('Ok', '0');
    }
}
