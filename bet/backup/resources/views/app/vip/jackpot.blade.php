@extends('account.layouts.master')

@section('title') {{$title}} @endsection
{{--@section('home') active @endsection--}}
@section('levelCSS') @endsection

@section('body')

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 nopaddingsmall">
                <div class="col-sm-12 nopaddingsmall" style="text-align: center">

                    @if(count($tt)>0)
                        <table class="table table-striped smTableFontSize" style="background-color: #f8f9f9; font-size: 14px; width: 100%; margin-top: -10px;">
                            <tbody>
                            <tr style="height: 9px;">
                                <td style="width: 8%; height: 9px; background-color: #2E86C1; text-align: center;"><span style="color: #ffffff;">DATE</span></td>
                                <td style="width: 8%; height: 9px; background-color: #2E86C1; text-align: center;"><span style="color: #ffffff;">TIME</span></td>
                                <td style="width: 10%; height: 9px; background-color: #2E86C1; text-align: center;"><span style="color: #ffffff;">LEAG</span></td>
                                <td style="width: 55%; height: 9px; background-color: #2E86C1; text-align: left;"><span style="color: #ffffff;">FIXTURE</span></td>
                                <td style="width: 12%; height: 9px; background-color: #2E86C1; text-align: center;"><span style="color: #ffffff;">TIP</span></td>
                                {{--<td style="width: 12%; height: 9px; background-color: #2E86C1; text-align: center;"><span style="color: #ffffff;">ODD</span></td>--}}
                                <td style="width: 15%; height: 9px; background-color: #2E86C1; text-align: center;"><span style="color: #ffffff;">RESULT</span></td>
                            </tr>
                            <?php $ttOdds = 1; ?>
                            @foreach($tt as $key => $item)
                                <tr style="height: 3px;">
                                    <td style="height: 3px; text-align: center;"><span style="color: #2E86C1;"><strong>{{\Carbon\Carbon::parse($item->gameDate)->format('d-m')}}</strong></span></td>
                                    <td style="height: 3px; text-align: center;"><span style="color: #2E86C1;"><strong>{{$item->gameTime}}</strong></span></td>
                                    <td style="height: 3px;  text-align: center;">{{$item->league}}</td>
                                    <td style="height: 3px; text-align: left;">{{ucfirst($item->teamOne)}} <span style="color: #2E86C1;"><strong>VS</strong></span> {{ucfirst($item->teamTwo)}}</td>
                                    @if($keys=='mega')
                                        <td><span>{{$item->megaTip}}</span></td>
{{--                                        <td style="width: 9%; background-color: #720000; color: #ffffff"><span>{{$item->megaOdds}}</span></td>--}}
                                    @elseif($keys=='midWeek')
                                        <td><span>{{$item->midWeekTip}}</span></td>
{{--                                        <td style="width: 9%; background-color: #720000; color: #ffffff"><span>{{$item->midWeekOdds}}</span></td>--}}
                                    @elseif($keys=='multibet3')
                                        <td><span>{{$item->multiBetThreeTip}}</span></td>
{{--                                        <td style="width: 9%; background-color: #720000; color: #ffffff"><span>{{$item->multiBetThreeOdds}}</span></td>--}}
                                    @elseif($keys=='btts')
                                        <td><span>BTTS/GG</span></td>
{{--                                        <td style="width: 9%; background-color: #720000; color: #ffffff"><span>{{$item->BTTSOdds}}</span></td>--}}
                                    @elseif($keys=='super')
                                        <td><span>{{$item->superTip}}</span></td>
{{--                                        <td style="width: 9%; background-color: #720000; color: #ffffff"><span>{{$item->superOdds}}</span></td>--}}
                                    @elseif($keys=='multibet1')
                                        <td><span>{{$item->multiBetOneTip}}</span></td>
{{--                                        <td style="width: 9%; background-color: #720000; color: #ffffff"><span>{{$item->multiBetOneOdds}}</span></td>--}}
                                    @elseif($keys=='ov3')
                                        <td><span>{{$item->over35Goals}}</span></td>
{{--                                        <td style="width: 9%; background-color: #720000; color: #ffffff"><span>{{$item->over35GoalsOdds}}</span></td>--}}
                                    @elseif($keys=='htft')
                                        <td><span>{{$item->HTFT}}</span></td>
{{--                                        <td style="width: 9%; background-color: #720000; color: #ffffff"><span>{{$item->HTFTOdds}}</span></td>--}}
                                    @elseif($keys=='wt')
                                        <td><span>{{$item->weekendTip}}</span></td>
{{--                                        <td style="width: 9%; background-color: #720000; color: #ffffff"><span>{{$item->weekendOdds}}</span></td>--}}
                                    @endif
                                    <td style="width: 11%; color: #720000"><span>{{$item->teamOneScore}}:{{$item->teamTwoScore}}</span></td>
                                </tr>

                            @endforeach
                            </tbody>
                        </table>
                        {{--<div class="col-sm-12"><h3 class="text-primary badge" style="background-color: #000;"> Odd Value =  <strong style="font-size: 16px;" class="text-primary">{{number_format($ttOdds, 2)}}</strong> </h3></div>--}}
                    @else
                        <h4 class="alert alert-warning text-center"><i class="fa fa-times-circle text-danger"></i>We had no tips here yesterday!.</h4>
                    @endif

                </div>
            </div>
        </div>
    </div>

@endsection

@section('levelJS') @endsection