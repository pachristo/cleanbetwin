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
use Mockery\Matcher\Not;

class GeneralController extends Controller
{
    public function getCounter($key)
    {
        if ($key=='predictions')
        {
            echo number_format(count(Prediction::where('gameType', '0')->get()));
        }
        elseif ($key=='testimonials')
        {
            echo count(Prediction::where('testimonial', '1')->get());
        }
        elseif ($key=='blogs')
        {
            echo number_format(count(Blog::get()));
        }
        elseif ($key=='ads')
        {
            echo number_format(count(User::where('subscription_status', '1')->get()));
        }
        elseif ($key=='leagues')
        {
            echo number_format(count(User::where('sub_count', '>', 0)->where('subscription_status', '0')->get()));
        }
        elseif ($key=='members')
        {
            echo number_format(count(User::all()));
        }
    }
    public function adminHome()
    {
        return view('/home');
    }

    public function getHome()
    {
        return view('/home');
    }

    public function newAds()
    {
        $ads = Ad::orderBy('id', 'DESC')->get();
        return view('/newads', compact('ads'));
    }

    public function newAdwords(Adword $adword)
    {
        $ads = $adword->where('id', '1')->first();
        $none = true;
        return view('/newAdwords', compact('ads', 'none'));
    }

    public function loadLeague()
    {
        return view('/loadleague');
    }

    public function manageLeague()
    {
        return view('/manageleague');
    }

    public function upcomingLeague()
    {
        return view('/slidenote');
    }

    public function planManager()
    {
        $data = Subscription::where('status','0')->get();
        return view('/planManager', ['data'=>$data]);
    }

    public function feedbackLoader()
    {
        $data = Feedback::where('approve', '0')->orderBy('id', 'DESC')->get();
        return view('/feedbackLoader', ['data'=>$data]);
    }

    public function sliderManager()
    {
        return view('/slider');
    }

    public function shotManager()
    {
        return view('/shot');
    }

    public function allAdmin()
    {
        $id = Auth::user()->id;

        $admin = System::where('id', '!=', $id)->where('status', '!=', '2')->get();
        return view('/admins', ['cont' => $admin]);
    }

    public function manageNotification()
    {
//        $note = Notification::all();
//        return view('/notemanage', ['notes' => $note]);
    }

    public function manageAds()
    {
        $ads = Ad::all()->sortByDesc('id');
        return view('/manageads', ['ads' => $ads]);
    }

    public function ajaxAdminControl($admincode)
    {
        $admin = System::find($admincode);
        return view('ajaxfiles.admincontrol', ['admin' => $admin]);
    }

    public function ajaxAdsUpdate($aid)
    {
        $ad = Ad::where('id', $aid)->first();
        return view('ajaxfiles.adsupdate', ['ad' => $ad]);
    }

    public function ajaxUpdatePassword(Request $request)
    {
        $id = trim($request['id']);
        $newpass = trim($request['newpass']);
        $newpass1 = trim($request['newpass1']);

        if($newpass!=$newpass1){
            $error = "PASSWORD MISMATCH";
            $status = 1;
            echo json_encode(array('encounters' => $error, 'status' => $status), JSON_PRETTY_PRINT);
        }
        else{
            $password = bcrypt($newpass);

                System::where('id', $id)
                    ->update(['password' => $password]);

                $error = "PASSWORD CHANGED";
                $status = 2;
                echo json_encode(array('encounters' => $error, 'status' => $status), JSON_PRETTY_PRINT);
        }
    }

    public function planUpdater(Request $request)
    {
        $id = trim($request['id']);
        $plan = trim($request['plan']);
        $accessTime = trim($request['accessTime']);
        $keshPrice = trim($request['keshPrice']);
        $nairaPrice = trim($request['nairaPrice']);
        $cedPrice = trim($request['cedPrice']);
        $tzsPrice = trim($request['tzsPrice']);
        $zmwPrice = trim($request['zmwPrice']);
        $zarPrice = trim($request['zarPrice']);
        $ugxPrice = trim($request['ugxPrice']);
        $dollarPrice = trim($request['dollarPrice']);
        $odds=trim($request['odds']);
        $planBenefits = trim($request['planBenefits']);
                Subscription::where('id', $id)
                    ->update(['planName' => $plan, 'accessTime' => $accessTime, 
                    'nairaPrice'=>$nairaPrice, 'keshPrice'=>$keshPrice, 'dollarPrice'=>$dollarPrice 
                    ,'cedPrice'=>$cedPrice, 'tzsPrice'=>$tzsPrice, 'zmwPrice'=>$zmwPrice,'ugxPrice'=>$ugxPrice
                    ,'zarPrice'=>$zarPrice,'planBenefits'=>$planBenefits,'odds'=>$odds]);

                $error = "SUBSCRIPTION UPDATED";
                $status = 2;
                echo json_encode(array('encounters' => $error, 'status' => $status), JSON_PRETTY_PRINT);
    }

    public function ajaxUpdateControl(Request $request)
    {
        $id = trim($request['id']);
        $role = trim($request['role']);
        $enable = trim($request['enable']);

                System::where('id', $id)
                    ->update(['category' => $role, 'status' => $enable]);

                $error = "CONTROLS UPDATED";
                $status = 2;
                echo json_encode(array('encounters' => $error, 'status' => $status), JSON_PRETTY_PRINT);
    }

    public function ajaxOtherRec(Request $request)
    {
        $id = trim($request['id']);
        $value = trim($request['otherftrec']);

                Prediction::where('id', $id)
                    ->update(['ft_others' => $value]);

                $error = $id;
                $status = 2;
                echo json_encode(array('encounters' => $error, 'status' => $status, 'text' => $value), JSON_PRETTY_PRINT);

    }


    public function ajaxAdminUpdate(Request $request)
    {
        $admin = Auth::user();
        $id = $admin->id;

        $adminname = trim($request['adminname']);
        $adminusername = trim($request['adminusername']);
        $adminemail = trim($request['adminemail']);
        $adminopkey = trim($request['adminopkey']);
        $adminoldpassword = trim($request['adminoldpassword']);
        $adminnewpassword = trim($request['adminnewpassword']);

        if ($adminnewpassword!=NULL){
            if(Auth::attempt(['password' => $adminoldpassword])){
                $newpass = bcrypt($adminnewpassword);
                System::where('id', $id)
                    ->update(['name' => $adminname, 'username' => $adminusername, 'email' => $adminemail, 'operation_key' => $adminopkey, 'password' => $newpass]);
                $error = "UPDATE SUCCEEDED";
                $status = 2;
                echo json_encode(array('encounters' => $error, 'status' => $status), JSON_PRETTY_PRINT);
            }
            else {
                $error = "OLD PASSWORD INCORRECT";
                $status = 1;
                echo json_encode(array('encounters' => $error, 'status' => $status), JSON_PRETTY_PRINT);
            }
        }
        else{
            System::where('id', $id)
                ->update(['name' => $adminname, 'username' => $adminusername, 'email' => $adminemail, 'operation_key' => $adminopkey]);
            $error = "UPDATE SUCCEEDED";
            $status = 2;
            echo json_encode(array('encounters' => $error, 'status' => $status), JSON_PRETTY_PRINT);
        }
    }

    public function postUploadGallery(Request $request, Gallery $gallery)
    {
        if (isset($request['file']))
        {
            $image = ImageValidator::validator($request['file'], 'gallery_image_');
            $request['file']->move('images/gallery', $image);
            $gallery->create(['path'=>$image]);
            ResponseFacade::validationMessage('Ok', 0);
        }
        ResponseFacade::validationMessage('SELECT AN IMAGE');
    }

    public function getGallery(Gallery $gallery)
    {
        $images = $gallery->orderBy('id', 'DESC')->get();
        return view('ajaxfiles.gallery', compact('images'));
    }

    public function getDeleteImage($id) {
        $image = Gallery::find($id)->first();
        if (file_exists(public_path('images/gallery/'.$image->path))) {
            unlink(public_path('images/gallery/'.$image->path));
        }
        Gallery::find($id)->delete();
        return 'Ok';
    }

    public function dpUpload(Request $request)
    {
        $admin = Auth::user();
        $id = $admin->id;

        $dp = $request['file'];
        $dpname = "";

        if($dp){
            $dpname = 'admin'.$id.'.png';
            $dp->move('images', $dpname);
        }

        System::where('id', $id)
            ->update(['dp' => $dpname]);

        return view('home')->with(['success' => 'DP CHANGED SUCCESSFULLY']);

    }

    public function newAdsPost(Request $request, Ad $ad)
    {
        $position = trim($request['position']);
        $location = trim($request['location']);
//        $page = trim($request['page']);
        $url = trim($request['url']);
//        $description = trim($request['description']);
        $control = trim($request['displaycontrol']);
        if($request['position']=='image'){
            if ($request['file']) {
                $adname = ImageValidator::validator($request['file'], 'ads');
    
    //            $confirm = count(Ad::where('position', $position)->where('location', $location)->where('status', '0')->get());
    //            if($confirm<1) {
                    $request['file']->move('images/ads', $adname);
    
                    $ad->ads_image = $adname;
                    $ad->position = $position;
                    $ad->location = $location;
    //                $ad->page = $page;
                    $ad->website = $url;
                    $ad->country= $request['country'];
    //                $ad->description = $description;
                    $ad->other = $control;
                    $ad->save();
                    ResponseFacade::validationMessage('NEW ADS ADDED SUCCESSFULLY', '0');
    //            }
    //            else{
    //                ResponseFacade::validationMessage('SPACE ALREADY OCCUPIED! DELETE OR MODIFY THE EXISTING');
    //            }
            } else {
                ResponseFacade::validationMessage('NO IMAGE SELECTED');
            }

        }else{
            if (trim($request['code'])!='') {
                
    
    
                    $ad->ads_image = '';
                    $ad->position = $position;
                    $ad->location = $location;
    //                $ad->page = $page;
                    $ad->website = $request['code'];
                    $ad->country= $request['country'];
    //                $ad->description = $description;
                    $ad->other = $control;
                    $ad->save();
                    ResponseFacade::validationMessage('NEW ADS ADDED SUCCESSFULLY', '0');
    //            }
    //            else{
    //                ResponseFacade::validationMessage('SPACE ALREADY OCCUPIED! DELETE OR MODIFY THE EXISTING');
    //            }
            } else {
                ResponseFacade::validationMessage('PLEASE ENTER THE ADVERT CODE');
            }

        }

       
    }

    public function postAdwords(Request $request, Adword $adword)
    {
        dd($request);
        $data = $request->except('_token');
//        dd($data);
        $adword->where('id', '1')->update(['a300by250'=>$data['a300by250']]);
        ResponseFacade::validationMessage('Ok', '0');
    }

    public function newSlider(Request $request)
    {
        $slide = $request['file'];
        $slidename = "";

            if ($slide) {
                $extension = $slide->getClientOriginalExtension();
                $slidename = rand(11111,99999).'.'.$extension;
                $slide->move('images/slider', $slidename);

                $new = new Slider();
                $new->path = $slidename;
                $new->save();

                return view('/slider')->with(['success' => 'IMAGE ADDED SUCCESSFULLY']);
            }


        else{
            return view('/slider')->with(['success' => 'NO IMAGE UPLOADED']);
        }

    }

    public function newShot(Request $request)
    {
        $shot = $request['file'];
        $desc = trim($request['desc']);
        $shotname = "";

        if ($shot) {
            $extension = $shot->getClientOriginalExtension();
            $shotname = rand(11111,99999).'.'.$extension;
            $shot->move('images/munch', $shotname);

            $new = new Shot();
            $new->path = $shotname;
            $new->desc = $desc;
            $new->save();

            return view('/shot')->with(['success' => 'MUNCH ADDED SUCCESSFULLY']);
        }


        else{
            return view('/shot')->with(['success' => 'NO IMAGE UPLOADED']);
        }

    }

    public function AdvertUpdate(Request $request)
    {

        $id = $request['id'];
        $image = $request['image'];

        $position = $request['position'];
        $location = $request['location'];
        $page = $request['page'];
        $url = $request['url'];
        $description = $request['description'];

        $ads = $request['file'];
        $adsname = "";

        $confirm = count(Ad::where('position', $position)->where('location', $location)->where('page', $page)->where('status', '0')->where('id', '!=', $id)->first());
        if($confirm<1) {

            if ($ads) {
                $adsname = $image;
                $ads->move('images/ads', $adsname);
            }

            Ad::where('id', $id)->update(['position' => $position, 'location'=>$location, 'page' => $page, 'website' => $url, 'description' => $description]);

            $ads = Ad::all();
            return view('/manageads', ['ads' => $ads, 'success' => 'ADVERT UPDATED SUCCESSFULLY']);
        }
        else{
            $ads = Ad::all();
            return view('/manageads', ['ads' => $ads, 'success' => 'SPACE ALREADY OCCUPIED! DELETE OR MODIFY THE EXISTING']);
        }

    }

    public function ajaxNewAdmin(Request $request)
    {

        $adminname = trim($request['adminname']);
        $adminusername = trim($request['adminusername']);
        $adminemail = trim($request['adminemail']);
        $category = trim($request['category']);
        $adminopkey = trim($request['adminopkey']);
        $password = trim($request['password']);
        $repassword = trim($request['repassword']);

        if ($password==$repassword){
            $confirm = count(System::where('email', $adminemail)->get());
                if($confirm>0){
                    $error = "EMAIL ALREADY IN USE";
                    $status = 1;
                    echo json_encode(array('encounters' => $error, 'status' => $status), JSON_PRETTY_PRINT);
                }
                else {
                    $newpass = bcrypt($repassword);
                    $admin = new System();
                    $admin->name = $adminname;
                    $admin->username = $adminusername;
                    $admin->email = $adminemail;
                    $admin->password = $newpass;
                    $admin->operation_key = $adminopkey;
                    $admin->category = $category;
                    $admin->status = "0";
                    $admin->save();

                    $error = "ADMIN REGISTERED SUCCESSFULLY";
                    $status = 2;
                    echo json_encode(array('encounters' => $error, 'status' => $status), JSON_PRETTY_PRINT);
                }
            }
            else {
                $error = "PASSWORD MISMATCH";
                $status = 1;
                echo json_encode(array('encounters' => $error, 'status' => $status), JSON_PRETTY_PRINT);
            }

    }

    public function newLeague(Request $request)
    {

        $league = trim($request['league']);
        $short = trim($request['short']);

        if ($league==NULL){
            $error = "INPUT LEAGUE NAME";
            $status = 1;
            echo json_encode(array('encounters' => $error, 'status' => $status), JSON_PRETTY_PRINT);
        }
        elseif ($short==NULL){
            $error = "INPUT LEAGUE SHORT CODE";
            $status = 1;
            echo json_encode(array('encounters' => $error, 'status' => $status), JSON_PRETTY_PRINT);
        }
        else {
            $check = League::where('league', $league)->first();
            if (!isset($check)) {
                $load = new League();
                $load->league = $league;
                $load->code = $short;
                $load->save();

                $error = "NEW LEAGUE ADDED";
                $status = 2;
                echo json_encode(array('encounters' => $error, 'status' => $status), JSON_PRETTY_PRINT);
            } else {
                $error = "<div class=\"alert alert-danger\">EXACT LEAGUE NAME ALREADY EXIST</div>";
                $status = 1;
                echo json_encode(array('encounters' => $error, 'status' => $status), JSON_PRETTY_PRINT);
            }
        }

    }

    public function ajaxAdsDelete($id)
    {
        $det = Ad::where('id', $id)->first();
        $image = $det->ads_image;
        // unlink('images/ads/'.$image);
        Ad::find($id)->delete();
    }

    public function sendDemo (Request $request)
    {
        $mail = $request['toref'];
        $content = $request['content'];

        $user = System::where('email', $mail)->first();
        $name = $user->name;

        $all = $request->all();
        Mail::send('mailtemplate.bc', ['name' => $name, 'content'=>$content], function ($message) use ($all) {
            $message->to($all['toref'], 'CLEANODDS')
                ->subject($all['title']);
        });

        $error = 'Demo mail sent to '.$mail;
        $status = 2;
        echo json_encode(array('encounters' => $error, 'status' => $status), JSON_PRETTY_PRINT);
    }

    public function postArchiveMass(Request $request)
    {
        $archive = new Archive();

        $error = $archive->archiveGames($request);
        $status = 0;
        $this->validationMessage($error, $status);
    }

    protected function validationMessage($error, $status=1)
    {
        echo json_encode(array('encounters' => $error, 'status' => $status), JSON_PRETTY_PRINT);
        exit();
    }

    public function getSponsoredAds(Sponsor $sponsor)
    {
        $ads = $sponsor->latest('id')->get();
        return view('sponsored', compact('ads'));
    }

    public function postSponsoredAds(Request $request, Partners $partners)
    {
        $data = $request->except('_token');
        $val = Validator::make($data, [
            'name' => 'required|string',
            'url' => 'required|string'
        ]);
        if ($val->fails()) ResponseFacade::validationMessage('ALL * FIELD ARE REQUIRED');
//        $uni = Validator::make($data, [
//            'sponsorUrl' => 'unique:sponsors'
//        ]);
//        if ($uni->fails()) ResponseFacade::validationMessage('SPONSOR LINK ALREADY EXISTS');
        $partners->create($data);
        ResponseFacade::validationMessage('Ok', '0');
    }

    public function postEditSponsor($id, Request $request, Sponsor $sponsor)
    {
        $data = $request->except('_token');
        $val = Validator::make($data, [
            'sponsorName' => 'required|string',
            'sponsorUrl' => 'required|url'
        ]);
        if ($val->fails()) ResponseFacade::validationMessage('ALL * FIELD ARE REQUIRED');

        $sponsor->where('id', $id)->update($data);
        ResponseFacade::validationMessage('Ok', '0');
    }

    public function getDeleteSponsor($id=null, Partners $sponsor)
    {
        $sponsor->find($id)->delete();
        ResponseFacade::validationMessage('Ok', '0');
    }

    public function getEditSponsor($id=null, Sponsor $sponsor)
    {
        $i = $sponsor->find($id);
        return view('ajaxfiles.editSponsor', compact('i'));
    }

    public function activeGameStatus($value=null, System $system)
    {
        $date = date('d-m-Y');
        $system->where('id', '1')->update(['activeGameDate'=>$date, 'activeGameStatus'=>$value]);
        ResponseFacade::validationMessage('Ok', '0');
    }

    public function newTextRotate(Request $request)
    {
        $rotate = trim($request['text']);
        $id = $request['sn'];

        if($id=='')
        {
            $text = new Textslider();
            $text->mainText = $rotate;
            $text->save();
        }
        $error = "DONE";
        $status = 2;
        echo json_encode(array('encounters' => $error, 'status' => $status), JSON_PRETTY_PRINT);
    }

    public function getPartners(Partners $partners)
    {
        $pts = $partners->latest()->get();
        return view('partners', compact('pts'));
    }

    public function getPlans(Subscription $data){

        return view('planManager',compact('data'));

    }
}