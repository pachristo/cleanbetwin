@php
   
    $tvt = \App\Focus\Modules\Subscription\Model\Subscription::find(15);
    $tvvt = \App\Focus\Modules\Subscription\Model\Subscription::find(16);
    $tot = \App\Focus\Modules\Subscription\Model\Subscription::find(17);
    $frivt = \App\Focus\Modules\Subscription\Model\Subscription::find(18);
    $satvt = \App\Focus\Modules\Subscription\Model\Subscription::find(19);
    $sunvt = \App\Focus\Modules\Subscription\Model\Subscription::find(20);

@endphp

<div class="row">
   <div class="col-lg-7">
       <div class="row mx-1">
        <div class="col-sm-12">
            <h2 class="text-center"> DAILY VIP TIPS</h2>
        </div>
        <div class="col-lg-4 p-2 col-6 col-xs-6">
            <a href=" {{  route('/todays_vip_tips') }}" class="category_box">
                <div >
                    <strong class="text-white">Today's VIP Tips</strong>
                    <br>
                    <div class=" d-block text-price">[<small> Get {{ $tvt->odds }} Odds  now @ {{ $tvt->ugxPrice }} SHS</small>]</div> 
                </div>
               
               
            </a>
        </div>
{{-- 
        sundays_vip_tips
        saturdays_vip_tips
        fridays_vip_tips
        todays_ordinary_vip_tips
        
        todays_vvip_tips
        todays_vip_tips --}}




        <div class="col-lg-4 p-2 col-6 col-xs-6">
            <a href="{{ route('/todays_vvip_tips')   }}" class="category_box">
                <div >
                    <strong class="text-white">Today's VVIP Tips</strong>
                    <br>
                    <div class=" d-block text-price">[<small> Get {{ $tvvt->odds }} Odds  now @ {{ $tvvt->ugxPrice }} SHS</small>]</div> 
                </div>
            </a>
        </div>
        <!-- WORK ON THIS -->
         <div class="col-lg-4 p-2 col-6 col-xs-6">
            <a href="{{
                route('/todays_ordinary_vip_tips')}}"  class="category_box">
                <div >
                    <strong class="text-white">Today's Ordinary VIP Tips</strong>
                    <br>
                    <div class=" d-block text-price">[<small>  Get {{ $tot->odds }} Odds  now @ {{ $tot->ugxPrice }} SHS</small>]</div> 
                </div>
            </a>
        </div>
        
       
        <div class="col-lg-4 p-2 col-6 col-xs-6">
            <a href="{{
                route('/fridays_vip_tips') }}" class="category_box">
                <div >
                    <strong class="text-white">Friday VIP Tips</strong>
                    <br>
                    <div class=" d-block text-price">[<small> Get {{ $frivt->odds }} Odds | safe 100% @ {{ $frivt->ugxPrice }} SHS</small>]</div> 
                </div>
            </a>
        </div>
        <div class="col-lg-4 p-2 col-6 col-xs-6">
            <a href="{{
                route('/saturdays_vip_tips') }}" class="category_box">
                <div >
                    <strong class="text-white" >Saturday VIP Tips</strong>
                    <br>
                    <div class=" d-block text-price">[<small> Get  {{ $satvt->odds }} Odds | safe 100% @ {{ $satvt->ugxPrice }} SHS</small>]</div> 
                </div>
            </a>
        </div>
        <div class="col-sm-4  p-2 col-6">
            <a href="{{
                route('/sundays_vip_tips') }}" class="category_box">
                <div >
                    <strong class="text-white">Sunday VIP Tips</strong>
                    <br>
                    <div class=" d-block text-price">[<small> Get {{ $sunvt->odds }} Odds | safe 100% @ {{ $sunvt->ugxPrice }} SHS</small>]</div> 
                </div>
            </a>
        </div>

       </div>
   </div>
   <div class="col-lg-5">
    <div class="row mx-1">
        <div class="col-sm-12">
            <h2 class="text-center"> PREMIUM VIP TIPS</h>
        </div>
        <div class="col-lg-6 p-2 col-6 col-xs-6">
            <a href=" {{  route('/sureTwoOdds') }}">
                <div class="category_box">
                    <strong class="text-white">Sure 2 Odds</strong>
                </div>
            </a>
        </div>






        <div class="col-lg-6 p-2 col-6 col-xs-6">
            <a href="{{ route('/sureThreeOdds')   }}">
                <div class="category_box">
                    <strong class="text-white">Sure 5 Odds</strong>
                </div>
            </a>
        </div>
        <!-- WORK ON THIS -->
         {{-- <div class="col-lg-6 p-2 col-6 col-xs-6">
            <a href="{{
                route('/sureFiveOdds')}}">
                <div class="category_box">
                    <strong class="text-white">Sure 10 Odds</strong>
                </div>
            </a>
        </div> --}}

        <div class="col-lg-6 p-2 col-6 col-xs-6">
            <a href="{{
                route('/weekend_tips') }}"class="category_box">
                <div >
                    <strong class="text-white">SAFE Fixed Ticket  </strong>
                    <br>
                    <div class=" d-block text-price">[<small>   20.26+ odds </small>]</div> 
                </div>
            </a>
        </div>
        <div class="col-lg-6 p-2 col-6 col-xs-6">
            <a href="{{
                route('/super_investment_tip') }}" class="category_box">
                <div>
                    <strong class="text-white"> Investments Tips </strong>
                    <br>
                    <div class=" d-block text-price">[<small> No Risk. Odds above 2.30 </small>]</div> 
                </div>
            </a>
        </div>

    </div>

   </div>




</div>
