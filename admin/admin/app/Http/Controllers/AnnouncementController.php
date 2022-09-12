<?php

namespace App\Http\Controllers;

use App\Ad;
use App\Adword;
use App\Archive;
use App\Blog;
use App\Feedback;
use App\Gallery;
use App\ImageValidator;
use App\Partners;
use App\ResponseFacade;
use App\Slider;
use App\Sponsor;
use App\Subscription;
use App\System;
use App\League;
use App\Prediction;
use App\Textslider;
use App\User;
use App\Shot;
use App\Announcement;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Collection;

use Illuminate\Support\Facades\Validator;
use \Input as Input;
use DateTime;
class AnnouncementController extends Controller
{
    //
    public  function  getAnnouncement(){
    	$announcement=Announcement::latest('created_at')->paginate(200);

    	return view('/announcement',compact('announcement'));
    }

    public function postTextAnnouncement(Request $request){

    	$request=$request->all();

    	$text='';

    	if($request['content']!=''){

    		$text=$request['content'];

    		Announcement::create(['type'=>'text','body'=>$text,'country'=>$request['country']]);

  			 return ResponseFacade::validationMessage('ok','0');

            }else{
            	return ResponseFacade::validationMessage('failed','1');
            }




    }

    public function postPictureAnnouncement(Request $request){

    	$request=$request->all();

    	 $slide = $request['file'];
         $slidename = "";

            if ($slide) {
                $extension = $slide->getClientOriginalExtension();
                $slidename = rand(11111,99999).'.'.$extension;
                $slide->move('images/announcement', $slidename);

                Announcement::create(['type'=>'picture','body'=>$slidename,'country'=>$request['country']]);

                return ResponseFacade::validationMessage('ok','0');

            }else{
            	return ResponseFacade::validationMessage('failed','1');
            }


    	
    }

    public function deleteAnnouncement($id){
    	Announcement::where('id',$id)->delete();
    }
}
