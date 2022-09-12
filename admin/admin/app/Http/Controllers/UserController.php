<?php

namespace App\Http\Controllers;

use App\EmailValidator;
use App\ResponseFacade;
use App\Subscription;
use App\System;
use App\Testimonial;
use App\User;
use App\ValidationMessage;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use App\ImageValidator;

class UserController extends Controller
{

    public function getDeactivate($id = null, User $user)
    {
        $mem = $user->find($id);
        if ($mem->subscription_status == '1') {
            $user->where('id', $id)->update(['subscription_status' => '0']);
            $user->where('id', $id)->decrement('sub_count');
            echo "Ok";
        }
    }
    public function getSmsDeactivate($id = null, User $user)
    {
        $mem = $user->find($id);
        if ($mem->sms_status == '1') {
            $user->where('id', $id)->update(['sms_status' => '']);
            //$user->where('id', $id)->decrement('sub_count');
            echo "Ok";
        }
    }

    public function getNewMember(Subscription $subscription)
    {
        $subs = $subscription->all();
        return view('/newMember', compact('subs'));
    }

    public function allUsers()
    {
        $user = User::latest('created_at')->paginate(200);
        return view('/members', ['members' => $user, 'title' => 'All Members']);
    }

    public function subscribedUsers()
    {
        $expiry = new User();
        $expiry->queryExpired();

        $sure2 = User::where('subscription_status', '1')
            ->where(function ($query) {
                $query->where('subscription_id', 1)->orWhere('subscription_id', 2)->orWhere('subscription_id', 12);
            })
            ->orderBy('date_subscribed', 'DESC')->paginate(1000);

        $sure3 = User::where('subscription_status', '1')
            ->where(function ($query) {
                $query->where('subscription_id', 3)->orWhere('subscription_id', 4)->orWhere('subscription_id', 13);
            })
            ->orderBy('date_subscribed', 'DESC')->paginate(1000);
        $sure5 = User::where('subscription_status', '1')
            ->where(function ($query) {
                $query->where('subscription_id', 5)->orWhere('subscription_id', 6)->orWhere('subscription_id', 14);
            })
            ->orderBy('date_subscribed', 'DESC')->paginate(1000);
        $investment = User::where('subscription_status', '1')
            ->where(function ($query) {
                $query->where('subscription_id', 9)->orWhere('subscription_id', 10)->orWhere('subscription_id', 11);
            })
            ->orderBy('date_subscribed', 'DESC')->paginate(1000);

        $tvt = User::where('subscription_status', '1')
            ->where(function ($query) {
                $query->where('subscription_id', 15);
            })
            ->orderBy('date_subscribed', 'DESC')->paginate(1000);
        $tvvt = User::where('subscription_status', '1')
            ->where(function ($query) {
                $query->where('subscription_id', 16);
            })
            ->orderBy('date_subscribed', 'DESC')->paginate(1000);
        $tot = User::where('subscription_status', '1')
            ->where(function ($query) {
                $query->where('subscription_id', 17);
            })
            ->orderBy('date_subscribed', 'DESC')->paginate(1000);
        $frivt = User::where('subscription_status', '1')
            ->where(function ($query) {
                $query->where('subscription_id', 18);
            })
            ->orderBy('date_subscribed', 'DESC')->paginate(1000);
        $satvt = User::where('subscription_status', '1')
            ->where(function ($query) {
                $query->where('subscription_id', 19);
            })
            ->orderBy('date_subscribed', 'DESC')->paginate(1000);
        $sunvt = User::where('subscription_status', '1')
            ->where(function ($query) {
                $query->where('subscription_id', 20);
            })
            ->orderBy('date_subscribed', 'DESC')->paginate(1000);
        return view('/activeSubscribers', compact('sure2', 'sure3', 'sure5', 'investment', 'tvt', 'tvvt', 'tot', 'frivt', 'satvt', 'sunvt'));
    }

    public function expiredUsers()
    {
        $expiry = new User();
        $expiry->queryExpired();

        $sure2 = User::where('sub_count', '>', '0')
            ->where(function ($query) {
                $query->where('subscription_id', 1)->orWhere('subscription_id', 2)->orWhere('subscription_id', 12);
            })
            ->where('subscription_status', '0')->orderBy('date_subscribed', 'DESC')->paginate(1000);

        $sure3 = User::where('sub_count', '>', '0')
            ->where(function ($query) {
                $query->where('subscription_id', 3)->orWhere('subscription_id', 4)->orWhere('subscription_id', 13);
            })
            ->where('subscription_status', '0')->orderBy('date_subscribed', 'DESC')->paginate(1000);

        $sure5 = User::where('sub_count', '>', '0')
            ->where(function ($query) {
                $query->where('subscription_id', 5)->orWhere('subscription_id', 6)->orWhere('subscription_id', 14);
            })
            ->where('subscription_status', '0')->orderBy('date_subscribed', 'DESC')->paginate(1000);

        $investment = User::where('sub_count', '>', '0')
            ->where(function ($query) {
                $query->where('subscription_id', 9)->orWhere('subscription_id', 10)->orWhere('subscription_id', 11);
            })
            ->where('subscription_status', '0')->orderBy('date_subscribed', 'DESC')->paginate(1000);

        $tvt = User::where('subscription_status', '0')
            ->where(function ($query) {
                $query->where('subscription_id', 15);
            })
            ->orderBy('date_subscribed', 'DESC')->paginate(1000);
        $tvvt = User::where('subscription_status', '0')
            ->where(function ($query) {
                $query->where('subscription_id', 16);
            })
            ->orderBy('date_subscribed', 'DESC')->paginate(1000);
        $tot = User::where('subscription_status', '0')
            ->where(function ($query) {
                $query->where('subscription_id', 17);
            })
            ->orderBy('date_subscribed', 'DESC')->paginate(1000);
        $frivt = User::where('subscription_status', '0')
            ->where(function ($query) {
                $query->where('subscription_id', 18);
            })
            ->orderBy('date_subscribed', 'DESC')->paginate(1000);
        $satvt = User::where('subscription_status', '0')
            ->where(function ($query) {
                $query->where('subscription_id', 19);
            })
            ->orderBy('date_subscribed', 'DESC')->paginate(1000);
        $sunvt = User::where('subscription_status', '0')
            ->where(function ($query) {
                $query->where('subscription_id', 20);
            })
            ->orderBy('date_subscribed', 'DESC')->paginate(1000);

        return view('/expiredSubscribers', compact('sure2', 'sure3', 'sure5', 'investment', 'tvt', 'tvvt', 'tot', 'frivt', 'satvt', 'sunvt'));
    }

    public function loadUserMails(Request $req)
    {

        if ($req['mail'] == 'sure2') {
            $user = User::where('sub_count', '>', '0')
                ->where(function ($query) {
                    $query->where('subscription_id', 1)->orWhere('subscription_id', 2)->orWhere('subscription_id', 12);
                })
                ->where('subscription_status', '1')->get(['email']);
        } elseif ($req['mail'] == 'sure5') {
            $user = User::where('sub_count', '>', '0')
                ->where(function ($query) {
                    $query->where('subscription_id', 3)->orWhere('subscription_id', 4)->orWhere('subscription_id', 13);
                })
                ->where('subscription_status', '1')->get(['email']);
        } elseif ($req['mail'] == 'sure10') {
            $user = User::where('sub_count', '>', '0')
                ->where(function ($query) {
                    $query->where('subscription_id', 5)->orWhere('subscription_id', 6)->orWhere('subscription_id', 14);
                })
                ->where('subscription_status', '1')->get(['email']);
        } elseif ($req['mail'] == 'investment') {
            $user = User::where('sub_count', '>', '0')
                ->where(function ($query) {
                    $query->where('subscription_id', 9)->orWhere('subscription_id', 10)->orWhere('subscription_id', 11);
                })
                ->where('subscription_status', '1')->get(['email']);
        } elseif ($req['mail'] == 'tvt') {
            $user = User::where('subscription_status', '1')
                ->where(function ($query) {
                    $query->where('subscription_id', 15);
                })->get(['email']);
        } elseif ($req['mail'] == 'tvvt') {
            $user = User::where('subscription_status', '1')
                ->where(function ($query) {
                    $query->where('subscription_id', 16);
                })->get(['email']);
        } elseif ($req['mail'] == 'tot') {
            $user = User::where('subscription_status', '1')
                ->where(function ($query) {
                    $query->where('subscription_id', 17);
                })->get(['email']);
        } elseif ($req['mail'] == 'frivt') {
            $user = User::where('subscription_status', '1')
                ->where(function ($query) {
                    $query->where('subscription_id', 18);
                })->get(['email']);
        } elseif ($req['mail'] == 'satvt') {
            $user = User::where('subscription_status', '1')
                ->where(function ($query) {
                    $query->where('subscription_id', 19);
                })->get(['email']);

        } elseif ($req['mail'] == 'sunvt') {
            $user = User::where('subscription_status', '1')
                ->where(function ($query) {
                    $query->where('subscription_id', 20);
                })->get(['email']);
        } elseif ($req['mail'] == 'all') {
            $user = User::where('subscription_status', '1')->get(['email']);
        }

        $mail = $user->implode('email', ', ');
        return response()->json(['mails' => $mail, 'code' => $req['mail']]);
    }

    public function ajaxUserInfoUpdate(Request $request)
    {
        $id = trim($request['userid']);
        $name = trim($request['name']);
        $username = trim($request['username']);
        $email = trim($request['email']);

        User::where('id', $id)
            ->update(['full_name' => $name, 'username' => $username, 'email' => $email]);

        ResponseFacade::validationMessage('USER DETAILS UPDATED', '2');
    }

    public function postNewMember(Request $request, User $user, Subscription $plan)
    {
        $data = $request->except('_token');

        $validate = Validator::make($request->all(), [
            'fullName' => 'string|required',
            'email' => 'email|required',
            'phone' => 'string|required',
            'username' => 'string|required',
            'password' => 'string|required',
            'type' => 'string|required',
            'datesub' => 'string|required',
        ]);

        if ($validate->fails()) {
            ResponseFacade::validationMessage('ALL * FIELDS ARE REQUIRED');
        }

        $phoneVal = Validator::make($request->all(), [
            'phone' => 'unique:users',
        ]);

        if ($phoneVal->fails()) {
            ResponseFacade::validationMessage('PHONE NUMBER ALREADY REGISTERED');
        }

        $datesub = trim($request['datesub']);
        $sub = $plan->getSub($request['type']);

        $next = strtotime('+' . $sub->accessTime, strtotime($datesub));
        $nextDue = date("Y-m-d H:i:s", $next);

        $user->create([
            'full_name' => $data['fullName'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'username' => $data['username'],
            'password' => bcrypt($data['password']),
            'country' => 'Kenya',
            'subscription_type' => $sub->planName,
            'subscription_status' => '1',
            'date_subscribed' => $datesub,
            'next_due_date' => $nextDue,
            'sub_count' => '1',
        ]);
        ResponseFacade::validationMessage('USER ACCOUNT SUCCESSFULLY CREATED', '2');
    }

    public function accountUpgrade(Request $request, User $user, Subscription $plan)
    {
        $id = trim($request['userid']);
        $datesub = trim($request['datesub']);
        $sub = $plan->getSub($request['type']);

        $user = $user->userSelect($id);

        if ($user->subscription_status == '1') {
            $next = strtotime('+' . $sub->accessTime, strtotime($user->next_due_date));
        } else {
            $next = strtotime('+' . $sub->accessTime, strtotime($datesub));
        }
        $nextDue = date("Y-m-d H:i:s", $next);

        $user->subscription_id = $sub->id;
        $user->subscription_type = $sub->planName;
        $user->subscription_status = '1';
        $user->date_subscribed = $datesub;
        $user->next_due_date = $nextDue;
        $user->save();
//        $user->update(['subscription_type'=>$sub->planName, 'subscription_status'=>'1', 'date_subscribed'=>$datesub, 'next_due_date'=>$nextDue]);

        $user->increment('sub_count');

        $email = filter_var($user->email, FILTER_SANITIZE_EMAIL);

        if (!filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
            if (EmailValidator::validator($email)) {
                $name = $user->full_name;

                Mail::send('mailtemplate.activation', ['name' => $name, 'sub' => $sub], function ($message) use ($email) {
                    $message->to($email, 'CLEANODDS')
                        ->subject('YOUR ACCOUNT HAS BEEN ACTIVATED');
                });
            }
        }

        ResponseFacade::validationMessage('USER ACCOUNT UPGRADED', '2');
    }

    public function ajaxUserPasswordUpdate(Request $request)
    {
        $id = trim($request['userid']);
        $newpass = trim($request['newpass']);
        $newpass1 = trim($request['confirmpass']);

        if ($newpass != $newpass1) {
            ResponseFacade::validationMessage('PASSWORD MISMATCH', '1');
        } else {
            $password = bcrypt($newpass);

            $user = new User();
            $user->userSelect($id)->update(['password' => $password]);

            ResponseFacade::validationMessage('USER PASSWORD CHANGED', '2');
        }
    }

    public function ajaxUserDelete(Request $request)
    {
        $userid = trim($request['usid']);
        $password = $request['password'];

        $admin = System::where('operation_key', $password)->first();
        if (isset($admin)) {

            $user = new User();
            $user->userSelect($userid)->delete();

            $status = 'd' . $userid;
            ResponseFacade::validationMessage("USER DELETED", $status);
        } else {
            ResponseFacade::validationMessage('INCORRECT OPERATION KEY', '1');
        }
    }

    public function sendBulk(Request $request)
    {
        $content = $request['content'];
        $date = Carbon::now()->format('d-m-Y');

        $users = User::where('email', '!=', null)->where('mailDate', '!=', $date)->get();
//        dd($users);
        foreach ($users->all() as $user) {
            $mail = $user->email;
            $email = filter_var($mail, FILTER_SANITIZE_EMAIL);

            if (!filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
                if (EmailValidator::validator($email)) {
                    $name = $user->full_name;

                    $all = $request->all();
                    Mail::send('mailtemplate.bc', ['name' => $name, 'content' => $content], function ($message) use ($all, $email) {
                        $message->to($email, 'CLEANODDS')
                            ->subject($all['mailtitle']);
                    });
                    User::where('id', $user->id)->update(['mailDate' => $date]);
                }
            }
        }
        $request->session()->flash('success', 'BROADCAST SENT SUCCESSFULLY');
        return redirect()->back();
    }

    public function bulkmailActive(Request $request)
    {
        $content = $request['content'];
        $date = Carbon::now()->format('d-m-Y');

        if ($request['code'] == 'sure2') {
            $user = User::where('sub_count', '>', '0')
                ->where(function ($query) {
                    $query->where('subscription_id', 1)->orWhere('subscription_id', 2)->orWhere('subscription_id', 12);
                })
                ->where('subscription_status', '1')->get();
        } elseif ($request['code'] == 'sure5') {
            $user = User::where('sub_count', '>', '0')
                ->where(function ($query) {
                    $query->where('subscription_id', 3)->orWhere('subscription_id', 4)->orWhere('subscription_id', 13);
                })
                ->where('subscription_status', '1')->get();
        } elseif ($request['code'] == 'sure10') {
            $user = User::where('sub_count', '>', '0')
                ->where(function ($query) {
                    $query->where('subscription_id', 5)->orWhere('subscription_id', 6)->orWhere('subscription_id', 14);
                })
                ->where('subscription_status', '1')->get();
        } elseif ($request['code'] == 'investment') {
            $user = User::where('sub_count', '>', '0')
                ->where(function ($query) {
                    $query->where('subscription_id', 9)->orWhere('subscription_id', 10)->orWhere('subscription_id', 11);
                })
                ->where('subscription_status', '1')->get();
        } elseif ($request['code'] == 'tvt') {
            $user = User::where('subscription_status', '1')
                ->where(function ($query) {
                    $query->where('subscription_id', 15);
                })->get();
        } elseif ($request['code'] == 'tvvt') {
            $user = User::where('subscription_status', '1')
                ->where(function ($query) {
                    $query->where('subscription_id', 16);
                })->get();
        } elseif ($request['code'] == 'tot') {
            $user = User::where('subscription_status', '1')
                ->where(function ($query) {
                    $query->where('subscription_id', 17);
                })->get();
        } elseif ($request['code'] == 'frivt') {
            $user = User::where('subscription_status', '1')
                ->where(function ($query) {
                    $query->where('subscription_id', 18);
                })->get();
        } elseif ($request['code'] == 'satvt') {
            $user = User::where('subscription_status', '1')
                ->where(function ($query) {
                    $query->where('subscription_id', 19);
                })->get();

        } elseif ($request['code'] == 'sunvt') {
            $user = User::where('subscription_status', '1')
                ->where(function ($query) {
                    $query->where('subscription_id', 20);
                })->get();
        } elseif ($request['code'] == 'all') {
            $user = User::where('subscription_status', '1')->get();
        }

        foreach ($user as $key => $user) {
            $mail = $user->email;
            $email = filter_var($mail, FILTER_SANITIZE_EMAIL);

            if (!filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
                if (EmailValidator::validator($email)) {
                    $name = $user->full_name;

                    $all = $request->all();
                    try {
                        Mail::send('mailtemplate.bc', ['name' => $name, 'content' => $content], function ($message) use ($all, $email) {
                            $message->to($email, 'CLEANODDS')
                                ->subject($all['mailtitle']);
                        });
                    } catch (\Exception $e) {

                    }

                    User::where('id', $user->id)->update(['mailDate' => $date]);
                }
            }
        }
        $request->session()->flash('success', 'BROADCAST SENT SUCCESSFULLY');
        return redirect()->back();
    }

    public function bulkmailExpired(Request $request)
    {
        $content = $request['content'];
        $date = Carbon::now()->format('d-m-Y');

        $users = User::where('email', '!=', null)->where('sub_count', '>', '0')->where('subscription_status', '0')->where('mailDate', '!=', $date)->get();
        foreach ($users->all() as $user) {
            $mail = $user->email;
            $email = filter_var($mail, FILTER_SANITIZE_EMAIL);

            if (!filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
                if (EmailValidator::validator($email)) {
                    $name = $user->full_name;

                    $all = $request->all();
                    Mail::send('mailtemplate.bc', ['name' => $name, 'content' => $content], function ($message) use ($all, $email) {
                        $message->to($email, 'CLEANODDS')
                            ->subject($all['mailtitle']);
                    });
                    User::where('id', $user->id)->update(['mailDate' => $date]);
                }
            }
        }
        $request->session()->flash('success', 'BROADCAST SENT SUCCESSFULLY');
        return redirect()->back();
    }

    public function bulkmailNone(Request $request)
    {
        $content = $request['content'];
        $date = Carbon::now()->format('d-m-Y');

        $users = User::where('email', '!=', null)->where('sub_count', '0')->where('mailDate', '!=', $date)->get();
        foreach ($users->all() as $user) {
            $mail = $user->email;
            $email = filter_var($mail, FILTER_SANITIZE_EMAIL);

            if (!filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
                if (EmailValidator::validator($email)) {
                    $name = $user->full_name;

                    $all = $request->all();
                    Mail::send('mailtemplate.bc', ['name' => $name, 'content' => $content], function ($message) use ($all, $email) {
                        $message->to($email, 'CLEANODDS')
                            ->subject($all['mailtitle']);
                    });
                    User::where('id', $user->id)->update(['mailDate' => $date]);
                }
            }
        }
        $request->session()->flash('success', 'BROADCAST SENT SUCCESSFULLY');
        return redirect()->back();
    }

    public function individualMailer(Request $request)
    {

        $content = $request['content'];
        $emails = $request['emails'];
        $mails = explode(' ', $emails);

        foreach ($mails as $mail) {
            $mail = filter_var($mail, FILTER_SANITIZE_EMAIL);

            if (!filter_var($mail, FILTER_VALIDATE_EMAIL) === false) {
                if (EmailValidator::validator($mail)) {
                    $all = $request->all();
                    Mail::send('mailtemplate.individual', ['name' => '', 'content' => $content], function ($message) use ($all, $mail) {
                        $message->to($mail, 'CLEANODDS')
                            ->subject($all['mailtitle']);
                    });
                }
            }
        }
        $request->session()->flash('success', 'BROADCAST SENT SUCCESSFULLY');
        return redirect()->back();
    }

    public function postBonusSubscribed(Request $request)
    {
        $days = trim($request['days']);
        $date = date('Y-m-d');

        $users = User::where('subscription_status', '1')->where('dateGift', '!=', $date)->get();
        foreach ($users as $user) {
            $next = strtotime('+' . $days . ' Days', strtotime($user->next_due_date));
            $nextdue = date("Y-m-d H:i:s", $next);

            User::where('id', $user->id)->update(['subscription_status' => '1', 'date_subscribed' => $date, 'next_due_date' => $nextdue, 'dateGift' => $date]);

            $mail = $user->email;

            Mail::send('mailtemplate.subGift', ['user' => $user, 'period' => $days], function ($message) use ($mail, $days) {
                $message->to($mail, 'CLEANODDS')
                    ->subject("YOU HAVE BEEN GIVEN ADDITIONAL $days DAYS VIP ACCESS");
            });
        }

        $error = count($users);
        ResponseFacade::validationMessage($error, '0');
    }

    public function postBonusLapsed(Request $request)
    {
        $days = trim($request['days']);
        $date = date('Y-m-d');

        $users = User::where('sub_count', '!=', '0')->where('subscription_status', '0')->where('dateGift', '!=', $date)->get();
        foreach ($users as $user) {
            $nextdue = date('Y-m-d H:i:s', strtotime('+' . $days . ' days'));
            User::where('id', $user->id)->update(['subscription_status' => '1', 'date_subscribed' => $date, 'next_due_date' => $nextdue, 'dateGift' => $date]);

            $mail = $user->email;

            Mail::send('mailtemplate.subGift', ['user' => $user, 'period' => $days], function ($message) use ($mail, $days) {
                $message->to($mail, 'CLEANODDS')
                    ->subject("YOU HAVE BEEN GIVEN ADDITIONAL $days DAYS VIP ACCESS");
            });
        }
        $error = count($users);
        ResponseFacade::validationMessage($error, '0');
    }

    public function systemRefresh()
    {
        $expire = new User();
        $affected = $expire->queryExpired();
        echo $affected . " EXPIRED USER ACCOUNT(S) DEACTIVATED!";
    }

    public function bulkMail()
    {
        $date = Carbon::today()->format('d-m-Y');
        $user = User::where('email', '!=', null)->where('mailDate', '!=', $date)->get(['email']);
        $mail = $user->implode('email', ', ');
        return view('/mails', ['mails' => $mail]);
    }

    public function bulkActive()
    {
        $date = Carbon::today()->format('d-m-Y');
        $user = User::where('email', '!=', null)->where('mailDate', '!=', $date)->where('subscription_status', '1')->get(['email']);
        $mail = $user->implode('email', ', ');
        return view('/activeMails', ['mails' => $mail]);
    }

    public function bulkExpired()
    {
        $date = Carbon::today()->format('d-m-Y');
        $user = User::where('email', '!=', null)->where('mailDate', '!=', $date)->where('sub_count', '>', '0')->where('subscription_status', '0')->get(['email']);
        $mail = $user->implode('email', ', ');
        return view('/bulkExpired', ['mails' => $mail]);
    }

    public function individualMail()
    {
        return view('/individualMail');
    }

    public function disabledUsers()
    {
        $user = User::where('status', '1')->get();
        return view('/dmembers', ['members' => $user]);
    }

    public function flaggedUsers()
    {
        $user = User::where('flag', '1')->get();
        return view('/fmembers', ['members' => $user]);
    }

    public function ajaxUserInfo($uid)
    {
        $user = User::where('id', $uid)->first();
        return view('ajaxfiles.userinfo', ['user' => $user]);
    }
    public function ajaxsmsUserInfo($uid)
    {
        $user = User::where('id', $uid)->first();
        return view('ajaxfiles.usersmsinfo', ['user' => $user]);
    }

    public function ajaxUserUpdate($uid)
    {
        $user = User::where('id', $uid)->first();
        return view('ajaxfiles.usersettings', ['user' => $user]);
    }

    public function postSearchMember(Request $request)
    {
        $term = trim($request['term']);

        if ($term) {
            $users = User::where(function ($query) use ($term) {
                $query->where('id', $term)->orWhere('full_name', 'like', '%' . $term . '%')->orWhere('email', $term)->orWhere('username', 'like', '%' . $term . '%')->orWhere('country', $term);
            })->paginate(200);

            return view('/members', ['members' => $users, 'title' => 'All Members']);
        }
    }

    public function postSearchSmsMember(Request $request)
    {
        $term = trim($request['term']);

        if ($term) {
            $users = User::where(function ($query) use ($term) {
                $query->where('id', $term)
                    ->orWhere('full_name', 'like', '%' . $term . '%')
                    ->orWhere('email', $term)
                    ->orWhere('sms_cat', 'like', '%' . $term . '%')
                    ->orWhere('country', $term)
                    ->orWhere('phone', $term);
            })->paginate(200);

            return view('/smsmembers', ['members' => $users, 'title' => 'All Members']);
        }
    }
    public function getSearchMember()
    {
        $user = User::latest('created_at')->paginate(200);
        return view('/members', ['members' => $user, 'title' => 'All Members']);
    }
    public function getSearchSmsMember()
    {
        $user = User::latest('created_at')->orderBy('id', 'desc')->paginate(200);
        return view('/smsmembers', ['members' => $user, 'title' => 'All Members']);
    }

    public function upgradeAccount($uid, User $user)
    {
        $user = $user->userSelect($uid);
        $subs = Subscription::where('status', '0')->get();
        return view('ajaxfiles.upgrade', ['user' => $user, 'subs' => $subs]);
    }

    public function getTestimonials(Testimonial $testimonial)
    {
        $tes = $testimonial->latest('created_at')->paginate(100);

        return view('/testimonial', compact('tes'));

    }
    public function postTestimonials(Testimonial $testimonial,Request $request){
        // 'user_name', 'image', 'text',
        $username = trim($request['user_name']);
        $text = trim($request['text']);

            if ($request['file']) {
                $image = ImageValidator::validator($request['file'], 'testimonial');
    

                    $request['file']->move('images/testimonial', $image);
    
                    $testimonial->user_name = $username;
                   $testimonial->text=$text;
                   $testimonial->country=$request['country'];
                   $testimonial->image=$image;
                    $testimonial->save();
                    ResponseFacade::validationMessage('TESTIMONIAL ADDED SUCCESSFULLY', '0');
   
            } else {
                ResponseFacade::validationMessage('NO IMAGE SELECTED');
            }

        
    }

    public function deleteTestimonials($id){
        Testimonial::where('id', $id)->delete();
        return 0;


    }
}
