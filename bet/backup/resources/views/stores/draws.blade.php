@extends('layout.master')
@section('title', 'Draws')
@section('winning', 'active')
@section('levelCSS') @endsection

@section('body')

    <section>
        <div class="container">
            <div class="row">
                <div class="col-xs-6 col-xs-offset-3">
                    <br><br>
                    <h2 class="header" style="margin-top: 60px; margin-bottom: 40px;">
                        Draws
                    </h2>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="row">

                @include('partial.headerAd')

                <div class="col-sm-8 col-sm-offset-2 nopaddingsmall">

                    <div class="rolandthemes-circle-tabs">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Yesterday</a></li>
                            <li role="presentation" class="active"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Today</a></li>
                            <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Tomorrow</a></li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane" id="home">
                                @if(count($yy)>0)
                                    <table class="table table-bordered table-striped text-center" style="font-size: 13px;">
                                        <thead>
                                        <tr style="color: orange; background: black">
                                            <th><center>Time</center></th>
                                            <th><center>League</center></th>
                                            <th><center>Fixture</center></th>
                                            <th><center>Tip</center></th>
                                            <th><center>Result</center></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($yy as $key => $item)
                                            <tr>
                                                <td>{{\Carbon\Carbon::parse($item->gameTime)->format('H:i')}}</td>
                                                <td>{{$item->league}}</td>
                                                <td>{{$item->teamOne}} <span>VS</span> {{$item->teamTwo}}</td>
                                                <td>{{$item->draws}}</td>
                                                <td><strong>{{$item->teamOneScore}}:{{$item->teamTwoScore}}</strong></td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                @else
                                    <p><center>There was no tip here!</center></p>
                                @endif
                            </div>
                            <div role="tabpanel" class="tab-pane active" id="profile">

                                @if(count($tt)>0)
                                    <table class="table table-bordered table-striped text-center" style="font-size: 13px;">
                                        <thead>
                                        <tr style="color: orange; background: black">
                                            <th><center>Time</center></th>
                                            <th><center>League</center></th>
                                            <th><center>Fixture</center></th>
                                            <th><center>Tip</center></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($tt as $key => $item)
                                            <tr>
                                                <td>{{\Carbon\Carbon::parse($item->gameTime)->format('H:i')}}</td>
                                                <td>{{$item->league}}</td>
                                                <td>{{$item->teamOne}} <span>VS</span> {{$item->teamTwo}}</td>
                                                <td>{{$item->draws}}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                @else
                                    <p><center>Today's Tips are not available yet!</center></p>
                                @endif

                            </div>
                            <div role="tabpanel" class="tab-pane" id="messages">
                                @if(count($tm)>0)
                                    <table class="table table-bordered table-striped text-center" style="font-size: 13px;">
                                        <thead>
                                        <tr style="color: orange; background: black">
                                            <th><center>Time</center></th>
                                            <th><center>League</center></th>
                                            <th><center>Fixture</center></th>
                                            <th><center>Tip</center></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($tm as $key => $item)
                                            <tr>
                                                <td>{{\Carbon\Carbon::parse($item->gameTime)->format('H:i')}}</td>
                                                <td>{{$item->league}}</td>
                                                <td>{{$item->teamOne}} <span>VS</span> {{$item->teamTwo}}</td>
                                                <td>{{$item->draws}}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                @else
                                    <p><center>Tomorrow's Tips are not available yet!</center></p>
                                @endif
                            </div>
                        </div>

                    </div>
                    <hr>
                    <div class="col-sm-12 text-justify">
                        <p>Football predictions in this category have a very high probability of ending in a draw at Full-Time (90-minutes), a draw is more likely between two sides of relatively equal ability.</p>
                        <br><br>
                    </div>
                </div>
                <div class="col-sm-12">
                    @include('partial.store')
                </div>
            </div>
        </div>
    </section>

@endsection

@section('levelJS') @endsection