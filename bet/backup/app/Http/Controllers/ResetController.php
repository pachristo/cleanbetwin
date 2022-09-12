<?php

namespace App\Http\Controllers;

use App\Focus\Modules\User\Model\User;
use App\Helpers\JSONResponder;
use App\Mail\PasswordResetEmail;
use Cartalyst\Sentinel\Laravel\Facades\Reminder;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailer;

class ResetController extends Controller
{
    public function postReset(Request $request, User $user, Mailer $mailer){
        $data = $user->whereEmail(trim($request->email))->first();

        if (isset($data)) {
            if ($id = Reminder::whereUserId($data->id)->whereCompleted('0')->first()){
                $reminder = $id;
            }
            else { $reminder = Reminder::create($data); }
            $mailer->to($request->email)->send(new PasswordResetEmail($data, $reminder->code));
            return response()->json(['message'=>'Link sent! Check your email box'], 200);
        }
        JSONResponder::validationMessage('Email Does Not Exist!');
    }

    public function getReset($email = null, $code = null, User $user, Request $request){
        $data = $user->whereEmail(trim($email))->first();

        if ($data) {
            if ($id = Reminder::exists($data, $code)) {
                $reminder = Reminder::whereCode($code)->first();
                if ($code == $reminder->code) {
                    return view('reset', compact('email', 'code', 'data'));
                }
            }
        }
        $request->session()->flash('err', 'RESET LINK EXPIRED!');
        return redirect('/login');
    }

    public function postResetPassword(Request $request, User $user) {
        $this->validate($request, [
            'password' => 'required|string|confirmed'
        ]);
        $data = $user->whereEmail(trim($request->email))->first();
        if ($data) {
            if ($id = Reminder::exists($data, $request->code)) {
                $reminder = Reminder::whereCode($request->code)->first();
                if ($request->code == $reminder->code) {
                    Reminder::complete($data, $request->code, $request->password);
                    $request->session()->flash('success', 'PASSWORD SUCCESSFULLY CHANGED!');
                    return redirect('/login');
                }
            }
        }
        $request->session()->flash('err', 'RESET LINK EXPIRED!');
        return redirect('/login');
    }
}
