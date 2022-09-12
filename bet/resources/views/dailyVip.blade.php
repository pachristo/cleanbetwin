@section('levelJS') @endsection
@extends('layout.master')
@section('name')
   Daily Pricing Plan - Cleanodds.com
@endsection
@section('vip')
    active
@endsection
@section('body')
    <style>
        .bg-primary {
            background: linear-gradient(45deg, #15420e, #11af24e0) !important;
        }

    </style>
    <!-- News Slider Area Start Here -->
    <?php
    
    $country = COUNTRYNAME;
    $announcements = \App\Announcement::all();
    
    ?>


    <section class="bg-body">
        <div class="container">
            <ul class="news-info-list text-center--md">

                <li>
                    <i class="fa fa-calendar" aria-hidden="true"></i><span id="current_date"></span>
                </li>

            </ul>
        </div>
    </section>



    <section class="bg-accent section-space-default">
        <div class="container">

            @include('partial.cat_head',['title'=>'Daily VIP Packages'])


            <?php
            $country = COUNTRYNAME;
            $ad1 = \App\Focus\Modules\Ad\Model\Ad::where('location', 'catstore')
                ->inRandomOrder()
                ->where('status', '0')
                ->first();
            $ad2 = \App\Focus\Modules\Ad\Model\Ad::where('location', 'mcatstore')
                ->inRandomOrder()
                ->where('status', '0')
                ->first();
            
            ?>



            {{-- desktop only --}}
            <div class="row">
                @if (isset($ad1))
                    <div class="col-12 hideSM mb-10">
                        <div class="ne-banner-layout1 mt-20-r text-center">
                            <a href="{{ $ad1->website }}" target="_blank">
                                <img src="{{ $path }}/ads/{{ $ad1->ads_image }}" alt="ad" class="img-fluid">
                            </a>
                        </div>
                    </div>
                @endif
                @if (isset($ad2))
                    {{-- mobile ad --}}
                    <div class="col-lg-4 col-md-12 hideLG">
                        <div class="row tab-space1">

                            <div class="col-sm-12 col-12 mb-10">
                                <a href="{{ $ad2->website }}" target="_blank">
                                    <img src="{{ $path }}/ads/{{ $ad2->ads_image }}" alt="news"
                                        class="img-fluid width-100">
                                </a>

                            </div>

                        </div>
                    </div>
                @endif

            </div>

            <style>
                .card {
                    position: relative;
                    display: -ms-flexbox;
                    display: flex;
                    -ms-flex-direction: column;
                    flex-direction: column;
                    min-width: 0;
                    word-wrap: break-word;
                    background-color: #fbce0c;
                    background-clip: border-box;
                    border: 1px solid rgba(0, 0, 0, 0.125);
                    border-radius: 0.25rem;
                }

                .btn {
                    display: inline-block;
                    font-weight: 400;
                    text-align: center;
                    white-space: nowrap;
                    vertical-align: middle;
                    -webkit-user-select: none;
                    -moz-user-select: none;
                    -ms-user-select: none;
                    user-select: none;
                    border: 1px solid #000000eb;
                    padding: .5rem .75rem;
                    font-size: 14px;
                    line-height: 1.25;
                    color: white;
                    background: black;
                    border-radius: .25rem;
                    transition: all .15s ease-in-out;
                }

                .table td,
                .table th {
                    padding: 0.3rem;
                    vertical-align: top;
                    border-top: 1px solid #e9ecef;
                }

                @media (max-width: 978px) {
                    .pl-0-m {
                        padding-left: 0px;
                    }
                }
                .mb-4 {
    margin-bottom: 20px !important;
}
            </style>

            {{-- `category`, `planName`, `accessTime`, `nairaPrice`, `keshPrice`, `dollarPrice`, `cedPrice`, `ugxPrice`, `tzsPrice`, `zarPrice`, `zmwPrice`, `planBenefits` --}}

            <div class="col-lg-12  nopaddingsmall ">

            @php
                                
                $tvt = \App\Focus\Modules\Subscription\Model\Subscription::where('id','15')->get();
                $tvvt = \App\Focus\Modules\Subscription\Model\Subscription::where('id','16')->get();
                $tot = \App\Focus\Modules\Subscription\Model\Subscription::where('id','17')->get();
                $frivt = \App\Focus\Modules\Subscription\Model\Subscription::where('id','18')->get();
                $satvt = \App\Focus\Modules\Subscription\Model\Subscription::where('id','19')->get();
                $sunvt = \App\Focus\Modules\Subscription\Model\Subscription::where('id','20')->get();
                
            @endphp



                <div class="container-fluid mt-4">
                    <div class="container-fluid ">
                        <div class="row justify-content-center">

                            @foreach ($tvt as $key => $value)


                                <div class="col-lg-4 col-md-4 mb-4 nopaddingsmall">
                                 
                                        <div class="card card1 h-100">
                                            <div class="card-body">
                                                <div class="col-lg-12 text-center text-danger py-2"> <strong >{{ $value->category }}</strong> </div>
                                               
                                                <span></span>
                                                <div class="row">
                                                    <div class="col-lg-6 col-6  pl-0-m">
                                                        <table class="table table-bordered table-striped ">
                                                            <tbody>

                                                                <tr>
                                                                    <td style="width: 80px;">NGN</td>
                                                                    <td style="width: 10.8438px;">
                                                                        <strong>{{ number_format($value->nairaPrice, 2, '.', ',') }}</strong>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td style="width: 80px;">KES</td>
                                                                    <td style="width: 10.8438px;">
                                                                        <strong>{{ number_format($value->keshPrice, 2, '.', ',') }}</strong>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td style="width: 80px;">UGX</td>
                                                                    <td style="width: 10.8438px;">
                                                                        <strong>
                                                                            {{ number_format($value->ugxPrice, 2, '.', ',') }}</strong>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td style="width: 80px;">USD</td>
                                                                    <td style="width: 10.8438px;">
                                                                        <strong>{{ number_format($value->dollarPrice, 2, '.', ',') }}</strong>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <div class="col-lg-6 col-6 ">
                                                        <table class="table table-bordered table-striped ">
                                                            <tbody>


                                                                <tr>
                                                                    <td style="width: 80px;">CED</td>
                                                                    <td style="width: 10.8438px;">
                                                                        <strong>
                                                                            {{ number_format($value->cedPrice, 2, '.', ',') }}</strong>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td style="width: 80px;">TZS</td>
                                                                    <td style="width: 10.8438px;">
                                                                        <strong>
                                                                            {{ number_format($value->tzsPrice, 2, '.', ',') }}</strong>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td style="width: 80px;">ZAR</td>
                                                                    <td style="width: 10.8438px;">
                                                                        <strong>
                                                                            {{ number_format($value->zarPrice, 2, '.', ',') }}</strong>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td style="width: 80px;">ZMW</td>
                                                                    <td style="width: 10.8438px;">
                                                                        <strong>
                                                                            {{ number_format($value->zmwPrice, 2, '.', ',') }}</strong>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>



                                                <div class="d-grid my-3">
                                                    <a href="{{ route('/pay') }}/{{ $value->category }}/{{ $value->planName }}"
                                                        class="btn btn-outline-dark btn-block">Buy </a>
                                                </div>
                                                <span>{{ $value->planBenefits }}</span>
                                            </div>


                                        </div>
                                </div>




                            @endforeach
                            @foreach ($tvvt as $key => $value)

                                <div class="col-lg-4 col-md-4 mb-4 nopaddingsmall">

                                        <div class="card card1 h-100">
                                            <div class="card-body">

                                                <div class="col-lg-12 text-center text-danger py-2"> <strong >{{ $value->category }}</strong> </div>
                                               
                                                <span></span>
                                                <div class="row">
                                                    <div class="col-lg-6 col-6  pl-0-m">
                                                        <table class="table table-bordered table-striped ">
                                                            <tbody>

                                                                <tr>
                                                                    <td style="width: 80px;">NGN</td>
                                                                    <td style="width: 10.8438px;">
                                                                        <strong>{{ number_format($value->nairaPrice, 2, '.', ',') }}</strong>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td style="width: 80px;">KES</td>
                                                                    <td style="width: 10.8438px;">
                                                                        <strong>{{ number_format($value->keshPrice, 2, '.', ',') }}</strong>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td style="width: 80px;">UGX</td>
                                                                    <td style="width: 10.8438px;">
                                                                        <strong>
                                                                            {{ number_format($value->ugxPrice, 2, '.', ',') }}</strong>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td style="width: 80px;">USD</td>
                                                                    <td style="width: 10.8438px;">
                                                                        <strong>{{ number_format($value->dollarPrice, 2, '.', ',') }}</strong>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <div class="col-lg-6 col-6 ">
                                                        <table class="table table-bordered table-striped ">
                                                            <tbody>


                                                                <tr>
                                                                    <td style="width: 80px;">CED</td>
                                                                    <td style="width: 10.8438px;">
                                                                        <strong>
                                                                            {{ number_format($value->cedPrice, 2, '.', ',') }}</strong>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td style="width: 80px;">TZS</td>
                                                                    <td style="width: 10.8438px;">
                                                                        <strong>
                                                                            {{ number_format($value->tzsPrice, 2, '.', ',') }}</strong>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td style="width: 80px;">ZAR</td>
                                                                    <td style="width: 10.8438px;">
                                                                        <strong>
                                                                            {{ number_format($value->zarPrice, 2, '.', ',') }}</strong>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td style="width: 80px;">ZMW</td>
                                                                    <td style="width: 10.8438px;">
                                                                        <strong>
                                                                            {{ number_format($value->zmwPrice, 2, '.', ',') }}</strong>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>



                                                <div class="d-grid my-3">
                                                    <a href="{{ route('/pay') }}/{{ $value->category }}/{{ $value->planName }}"
                                                        class="btn btn-outline-dark btn-block">Buy </a>
                                                </div>
                                                <span>{{ $value->planBenefits }}</span>
                                            </div>


                                        </div>
                                </div>
                            @endforeach
                            @foreach ($tot as $key => $value)

                            <div class="col-lg-4 col-md-4 mb-4 nopaddingsmall">

                                    <div class="card card1 h-100">
                                        <div class="card-body">

                                            <div class="col-lg-12 text-center text-danger py-2"> <strong >{{ $value->category }}</strong> </div>
                                               
                                            <span></span>
                                            <div class="row">
                                                <div class="col-lg-6 col-6  pl-0-m">
                                                    <table class="table table-bordered table-striped ">
                                                        <tbody>

                                                            <tr>
                                                                <td style="width: 80px;">NGN</td>
                                                                <td style="width: 10.8438px;">
                                                                    <strong>{{ number_format($value->nairaPrice, 2, '.', ',') }}</strong>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td style="width: 80px;">KES</td>
                                                                <td style="width: 10.8438px;">
                                                                    <strong>{{ number_format($value->keshPrice, 2, '.', ',') }}</strong>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td style="width: 80px;">UGX</td>
                                                                <td style="width: 10.8438px;">
                                                                    <strong>
                                                                        {{ number_format($value->ugxPrice, 2, '.', ',') }}</strong>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td style="width: 80px;">USD</td>
                                                                <td style="width: 10.8438px;">
                                                                    <strong>{{ number_format($value->dollarPrice, 2, '.', ',') }}</strong>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="col-lg-6 col-6 ">
                                                    <table class="table table-bordered table-striped ">
                                                        <tbody>


                                                            <tr>
                                                                <td style="width: 80px;">CED</td>
                                                                <td style="width: 10.8438px;">
                                                                    <strong>
                                                                        {{ number_format($value->cedPrice, 2, '.', ',') }}</strong>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td style="width: 80px;">TZS</td>
                                                                <td style="width: 10.8438px;">
                                                                    <strong>
                                                                        {{ number_format($value->tzsPrice, 2, '.', ',') }}</strong>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td style="width: 80px;">ZAR</td>
                                                                <td style="width: 10.8438px;">
                                                                    <strong>
                                                                        {{ number_format($value->zarPrice, 2, '.', ',') }}</strong>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td style="width: 80px;">ZMW</td>
                                                                <td style="width: 10.8438px;">
                                                                    <strong>
                                                                        {{ number_format($value->zmwPrice, 2, '.', ',') }}</strong>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>



                                            <div class="d-grid my-3">
                                                <a href="{{ route('/pay') }}/{{ $value->category }}/{{ $value->planName }}"
                                                    class="btn btn-outline-dark btn-block">Buy </a>
                                            </div>
                                            <span>{{ $value->planBenefits }}</span>
                                        </div>


                                    </div>
                            </div>
                        @endforeach


                        @foreach ($frivt as $key => $value)


                        <div class="col-lg-4 col-md-4 mb-4 nopaddingsmall">
                           
                                <div class="card card1 h-100">
                                    <div class="card-body">

                                        <div class="col-lg-12 text-center text-danger py-2"> <strong >{{ $value->category }}</strong> </div>
                                               
                                        <span></span>
                                        <div class="row">
                                            <div class="col-lg-6 col-6  pl-0-m">
                                                <table class="table table-bordered table-striped ">
                                                    <tbody>

                                                        <tr>
                                                            <td style="width: 80px;">NGN</td>
                                                            <td style="width: 10.8438px;">
                                                                <strong>{{ number_format($value->nairaPrice, 2, '.', ',') }}</strong>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="width: 80px;">KES</td>
                                                            <td style="width: 10.8438px;">
                                                                <strong>{{ number_format($value->keshPrice, 2, '.', ',') }}</strong>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="width: 80px;">UGX</td>
                                                            <td style="width: 10.8438px;">
                                                                <strong>
                                                                    {{ number_format($value->ugxPrice, 2, '.', ',') }}</strong>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="width: 80px;">USD</td>
                                                            <td style="width: 10.8438px;">
                                                                <strong>{{ number_format($value->dollarPrice, 2, '.', ',') }}</strong>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="col-lg-6 col-6 ">
                                                <table class="table table-bordered table-striped ">
                                                    <tbody>


                                                        <tr>
                                                            <td style="width: 80px;">CED</td>
                                                            <td style="width: 10.8438px;">
                                                                <strong>
                                                                    {{ number_format($value->cedPrice, 2, '.', ',') }}</strong>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="width: 80px;">TZS</td>
                                                            <td style="width: 10.8438px;">
                                                                <strong>
                                                                    {{ number_format($value->tzsPrice, 2, '.', ',') }}</strong>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="width: 80px;">ZAR</td>
                                                            <td style="width: 10.8438px;">
                                                                <strong>
                                                                    {{ number_format($value->zarPrice, 2, '.', ',') }}</strong>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="width: 80px;">ZMW</td>
                                                            <td style="width: 10.8438px;">
                                                                <strong>
                                                                    {{ number_format($value->zmwPrice, 2, '.', ',') }}</strong>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>



                                        <div class="d-grid my-3">
                                            <a href="{{ route('/pay') }}/{{ $value->category }}/{{ $value->planName }}"
                                                class="btn btn-outline-dark btn-block">Buy </a>
                                        </div>
                                        <span>{{ $value->planBenefits }}</span>
                                    </div>


                                </div>
                        </div>




                    @endforeach
                    @foreach ($satvt as $key => $value)

                        <div class="col-lg-4 col-md-4 mb-4 nopaddingsmall">
                         
                                <div class="card card1 h-100">
                                    <div class="card-body">
                                        <div class="col-lg-12 text-center text-danger py-2"> <strong >{{ $value->category }}</strong> </div>
                                               
                                        <span></span>
                                        <div class="row">
                                            <div class="col-lg-6 col-6  pl-0-m">
                                                <table class="table table-bordered table-striped ">
                                                    <tbody>

                                                        <tr>
                                                            <td style="width: 80px;">NGN</td>
                                                            <td style="width: 10.8438px;">
                                                                <strong>{{ number_format($value->nairaPrice, 2, '.', ',') }}</strong>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="width: 80px;">KES</td>
                                                            <td style="width: 10.8438px;">
                                                                <strong>{{ number_format($value->keshPrice, 2, '.', ',') }}</strong>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="width: 80px;">UGX</td>
                                                            <td style="width: 10.8438px;">
                                                                <strong>
                                                                    {{ number_format($value->ugxPrice, 2, '.', ',') }}</strong>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="width: 80px;">USD</td>
                                                            <td style="width: 10.8438px;">
                                                                <strong>{{ number_format($value->dollarPrice, 2, '.', ',') }}</strong>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="col-lg-6 col-6 ">
                                                <table class="table table-bordered table-striped ">
                                                    <tbody>


                                                        <tr>
                                                            <td style="width: 80px;">CED</td>
                                                            <td style="width: 10.8438px;">
                                                                <strong>
                                                                    {{ number_format($value->cedPrice, 2, '.', ',') }}</strong>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="width: 80px;">TZS</td>
                                                            <td style="width: 10.8438px;">
                                                                <strong>
                                                                    {{ number_format($value->tzsPrice, 2, '.', ',') }}</strong>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="width: 80px;">ZAR</td>
                                                            <td style="width: 10.8438px;">
                                                                <strong>
                                                                    {{ number_format($value->zarPrice, 2, '.', ',') }}</strong>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="width: 80px;">ZMW</td>
                                                            <td style="width: 10.8438px;">
                                                                <strong>
                                                                    {{ number_format($value->zmwPrice, 2, '.', ',') }}</strong>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>



                                        <div class="d-grid my-3">
                                            <a href="{{ route('/pay') }}/{{ $value->category }}/{{ $value->planName }}"
                                                class="btn btn-outline-dark btn-block">Buy </a>
                                        </div>
                                        <span>{{ $value->planBenefits }}</span>
                                    </div>


                                </div>
                        </div>
                    @endforeach
                    @foreach ($sunvt as $key => $value)

                    <div class="col-lg-4 col-md-4 mb-4 nopaddingsmall">
                        
                            <div class="card card1 h-100">
                                <div class="card-body">

                                    <div class="col-lg-12 text-center text-danger py-2"> <strong >{{ $value->category }}</strong> </div>
                                               
                                    <span></span>
                                    <div class="row">
                                        <div class="col-lg-6 col-6  pl-0-m">
                                            <table class="table table-bordered table-striped ">
                                                <tbody>

                                                    <tr>
                                                        <td style="width: 80px;">NGN</td>
                                                        <td style="width: 10.8438px;">
                                                            <strong>{{ number_format($value->nairaPrice, 2, '.', ',') }}</strong>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width: 80px;">KES</td>
                                                        <td style="width: 10.8438px;">
                                                            <strong>{{ number_format($value->keshPrice, 2, '.', ',') }}</strong>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width: 80px;">UGX</td>
                                                        <td style="width: 10.8438px;">
                                                            <strong>
                                                                {{ number_format($value->ugxPrice, 2, '.', ',') }}</strong>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width: 80px;">USD</td>
                                                        <td style="width: 10.8438px;">
                                                            <strong>{{ number_format($value->dollarPrice, 2, '.', ',') }}</strong>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="col-lg-6 col-6 ">
                                            <table class="table table-bordered table-striped ">
                                                <tbody>


                                                    <tr>
                                                        <td style="width: 80px;">CED</td>
                                                        <td style="width: 10.8438px;">
                                                            <strong>
                                                                {{ number_format($value->cedPrice, 2, '.', ',') }}</strong>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width: 80px;">TZS</td>
                                                        <td style="width: 10.8438px;">
                                                            <strong>
                                                                {{ number_format($value->tzsPrice, 2, '.', ',') }}</strong>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width: 80px;">ZAR</td>
                                                        <td style="width: 10.8438px;">
                                                            <strong>
                                                                {{ number_format($value->zarPrice, 2, '.', ',') }}</strong>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width: 80px;">ZMW</td>
                                                        <td style="width: 10.8438px;">
                                                            <strong>
                                                                {{ number_format($value->zmwPrice, 2, '.', ',') }}</strong>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>



                                    <div class="d-grid my-3">
                                        <a href="{{ route('/pay') }}/{{ $value->category }}/{{ $value->planName }}"
                                            class="btn btn-outline-dark btn-block">Buy </a>
                                    </div>
                                    <span>{{ $value->planBenefits }}</span>
                                </div>


                            </div>
                    </div>
                @endforeach


                        </div>
                    </div>




                </div>

            </div>

    </section>








@endsection
