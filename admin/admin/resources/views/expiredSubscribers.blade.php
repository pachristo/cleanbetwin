@extends('layouts.master')

@section('title')
    CLEANODDS | EXPIRED SUBSCRIBERS
@endsection
@section('page')
    Expired Accounts
    {{--<button class="btn btn-sm btn-success pull-right" id="exportbtn"><span class="fa fa-download"></span> DOWNLOAD AS SPREADSHEET</button>--}}
@endsection
@section('content')
<div class="" role="tabpanel" data-example-id="togglable-tabs">
    <ul id="myTab1" class="nav nav-tabs bar_tabs" role="tablist">
        <li role="presentation" class="active"><a href="#tab_content11" id="home-tabb" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">Sure 2 Package</a>
        </li>
        <li role="presentation" class=""><a href="#tab_content22" role="tab" id="profile-tabb" data-toggle="tab" aria-controls="profile" aria-expanded="false">Sure 5 Package</a>
        </li>
        {{-- <li role="presentation" class=""><a href="#tab_content44" role="tab" id="profile-tabb" data-toggle="tab" aria-controls="profile" aria-expanded="false">Sure 10 Package</a>
        </li> --}}
        <li role="presentation" class=""><a href="#tab_content33" role="tab" id="profile-tabb" data-toggle="tab" aria-controls="investment" aria-expanded="false">Investment </a>
        </li>



        <li role="presentation" class=""><a href="#today_vip_ticket" id="home-tabb" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="false">Today's ViP T. </a>
        </li>
        <li role="presentation" class=""><a href="#today_vvip_ticket" role="tab" id="profile-tabb" data-toggle="tab" aria-controls="profile" aria-expanded="false">Today's VVip T. </a>
        </li>
        <li role="presentation" class=""><a href="#today_ordinary_ticket" role="tab" id="profile-tabb" data-toggle="tab" aria-controls="profile" aria-expanded="false">Today's Ordinary T.</a>
        </li>



        <li role="presentation" class=""><a href="#friday_ticket" id="home-tabb" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="false">Fri. Ticket</a>
        </li>
        <li role="presentation" class=""><a href="#saturday_ticket" role="tab" id="profile-tabb" data-toggle="tab" aria-controls="profile" aria-expanded="false">Sat. Ticket</a>
        </li>
        <li role="presentation" class=""><a href="#sunday_ticket" role="tab" id="profile-tabb" data-toggle="tab" aria-controls="profile" aria-expanded="false">Sun. Ticket</a>
        </li>
     
    </ul>
    <div id="myTabContent2" class="tab-content">
        <div role="tabpanel" class="tab-pane fade active in" id="tab_content11" aria-labelledby="home-tab">
            <div class="row">
                <div class="col-sm-12">
                    <table id="" class="table datatable table-striped table-bordered nowrap" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>S/N</th>
                            <th>ID</th>
                            <th>FULL NAME</th>
                            <th>EMAIL ADDRESS</th>
                            <th>PLAN</th>
                            <th>SUBSCRIBE DATE</th>
                            <th>DUE DATE</th>
                            <th>Controls</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($sure2->all() as $i => $user)
                            <tr class="d{{$user->id}}">
                                <td class="red">{{$i+1}}</td>
                                <td class="red">{{$user->id}}</td>
                                <td>{{$user->full_name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->sub->accessTime}}</td>
                                <td>{{\Carbon\Carbon::parse($user->date_subscribed)->format('d M @ h:ia')}}</td>
                                <td>{{\Carbon\Carbon::parse($user->next_due_date)->format('d M @ h:ia')}}</td>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                            Actions
                                            <span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu pull-right" role="menu" style="background: whitesmoke; -webkit-box-shadow: inset 0px 0px 10px grey;-moz-box-shadow: inset 0px 0px 10px grey;box-shadow: inset 0px 0px 10px grey;">
                                            <li></li>
                                            <li style="cursor: pointer;"><a class="userdetails" href="{{$user->id}}" data-target="#userdetails" data-toggle="modal">VIEW DETAILS</a></li>
                                            <li style="cursor: pointer;"><a class="updateuser" href="{{$user->id}}" data-target="#updateuserinfo" data-toggle="modal">EDIT/UPDATE</a></li>
                                            <li style="cursor: pointer;"><a class="upgradeuser" href="{{$user->id}}" data-target="#upgradeuser" data-toggle="modal"><span class="fa fa-credit-card"></span> UPGRADE ACCOUNT</a></li>
                                            
                                            <li class="divider"></li>
                                            @if($user->flag=='0')
                                                <li style="cursor: pointer;"><a class="flaguser" href="{{$user->id}}" id="f{{$user->id}}">FLAG USER</a>
                                            @else
                                                <li style="cursor: pointer;"><a class="unflaguser" href="{{$user->id}}" id="f{{$user->id}}"><span style="color: red;">UNFLAG USER</span></a>
                                            @endif
                                            @if($user->status=='0')
                                                <li style="cursor: pointer;"><a class="disableuser" href="{{$user->id}}" id="h{{$user->id}}">DISABLE USER</a>
                                            @else
                                                <li style="cursor: pointer;"><a class="enableuser" href="{{$user->id}}" id="h{{$user->id}}"><span style="color: green;">ENABLE USER</span></a>
                                            @endif
                                            <li style="cursor: pointer;"><a class="userdelete" href="{{$user->id}}" data-target="#userdelete" data-toggle="modal">DELETE USER</a>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div role="tabpanel" class="tab-pane fade" id="tab_content22" aria-labelledby="profile-tab">
            <div class="row">
                <div class="col-sm-12">
                    <table id="" class="table datatable table-striped table-bordered nowrap" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>S/N</th>
                            <th>ID</th>
                            <th>FULL NAME</th>
                            <th>EMAIL ADDRESS</th>
                            <th>PLAN</th>
                            <th>SUBSCRIBE DATE</th>
                            <th>DUE DATE</th>
                            <th>Controls</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($sure3->all() as $i => $user)
                            <tr class="d{{$user->id}}">
                                <td class="red">{{$i+1}}</td>
                                <td class="red">{{$user->id}}</td>
                                <td>{{$user->full_name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->sub->accessTime}}</td>
                                <td>{{\Carbon\Carbon::parse($user->date_subscribed)->format('d M @ h:ia')}}</td>
                                <td>{{\Carbon\Carbon::parse($user->next_due_date)->format('d M @ h:ia')}}</td>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                            Actions
                                            <span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu pull-right" role="menu" style="background: whitesmoke; -webkit-box-shadow: inset 0px 0px 10px grey;-moz-box-shadow: inset 0px 0px 10px grey;box-shadow: inset 0px 0px 10px grey;">
                                            <li></li>
                                            <li style="cursor: pointer;"><a class="userdetails" href="{{$user->id}}" data-target="#userdetails" data-toggle="modal">VIEW DETAILS</a></li>
                                            <li style="cursor: pointer;"><a class="updateuser" href="{{$user->id}}" data-target="#updateuserinfo" data-toggle="modal">EDIT/UPDATE</a></li>
                                            <li style="cursor: pointer;"><a class="upgradeuser" href="{{$user->id}}" data-target="#upgradeuser" data-toggle="modal"><span class="fa fa-credit-card"></span> UPGRADE ACCOUNT</a></li>
                                            
                                            <li class="divider"></li>
                                            @if($user->flag=='0')
                                                <li style="cursor: pointer;"><a class="flaguser" href="{{$user->id}}" id="f{{$user->id}}">FLAG USER</a>
                                            @else
                                                <li style="cursor: pointer;"><a class="unflaguser" href="{{$user->id}}" id="f{{$user->id}}"><span style="color: red;">UNFLAG USER</span></a>
                                            @endif
                                            @if($user->status=='0')
                                                <li style="cursor: pointer;"><a class="disableuser" href="{{$user->id}}" id="h{{$user->id}}">DISABLE USER</a>
                                            @else
                                                <li style="cursor: pointer;"><a class="enableuser" href="{{$user->id}}" id="h{{$user->id}}"><span style="color: green;">ENABLE USER</span></a>
                                            @endif
                                            <li style="cursor: pointer;"><a class="userdelete" href="{{$user->id}}" data-target="#userdelete" data-toggle="modal">DELETE USER</a>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div role="tabpanel" class="tab-pane fade" id="tab_content44" aria-labelledby="profile-tab">
            <div class="row">
                <div class="col-sm-12">
                    <table id="" class="table datatable table-striped table-bordered nowrap" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>S/N</th>
                            <th>ID</th>
                            <th>FULL NAME</th>
                            <th>EMAIL ADDRESS</th>
                            <th>PLAN</th>
                            <th>SUBSCRIBE DATE</th>
                            <th>DUE DATE</th>
                            <th>Controls</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($sure5->all() as $i => $user)
                            <tr class="d{{$user->id}}">
                                <td class="red">{{$i+1}}</td>
                                <td class="red">{{$user->id}}</td>
                                <td>{{$user->full_name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->sub->accessTime}}</td>
                                <td>{{\Carbon\Carbon::parse($user->date_subscribed)->format('d M @ h:ia')}}</td>
                                <td>{{\Carbon\Carbon::parse($user->next_due_date)->format('d M @ h:ia')}}</td>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                            Actions
                                            <span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu pull-right" role="menu" style="background: whitesmoke; -webkit-box-shadow: inset 0px 0px 10px grey;-moz-box-shadow: inset 0px 0px 10px grey;box-shadow: inset 0px 0px 10px grey;">
                                            <li></li>
                                            <li style="cursor: pointer;"><a class="userdetails" href="{{$user->id}}" data-target="#userdetails" data-toggle="modal">VIEW DETAILS</a></li>
                                            <li style="cursor: pointer;"><a class="updateuser" href="{{$user->id}}" data-target="#updateuserinfo" data-toggle="modal">EDIT/UPDATE</a></li>
                                            <li style="cursor: pointer;"><a class="upgradeuser" href="{{$user->id}}" data-target="#upgradeuser" data-toggle="modal"><span class="fa fa-credit-card"></span> UPGRADE ACCOUNT</a></li>
                                            
                                            <li class="divider"></li>
                                            @if($user->flag=='0')
                                                <li style="cursor: pointer;"><a class="flaguser" href="{{$user->id}}" id="f{{$user->id}}">FLAG USER</a>
                                            @else
                                                <li style="cursor: pointer;"><a class="unflaguser" href="{{$user->id}}" id="f{{$user->id}}"><span style="color: red;">UNFLAG USER</span></a>
                                            @endif
                                            @if($user->status=='0')
                                                <li style="cursor: pointer;"><a class="disableuser" href="{{$user->id}}" id="h{{$user->id}}">DISABLE USER</a>
                                            @else
                                                <li style="cursor: pointer;"><a class="enableuser" href="{{$user->id}}" id="h{{$user->id}}"><span style="color: green;">ENABLE USER</span></a>
                                            @endif
                                            <li style="cursor: pointer;"><a class="userdelete" href="{{$user->id}}" data-target="#userdelete" data-toggle="modal">DELETE USER</a>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div role="tabpanel" class="tab-pane fade" id="tab_content33" aria-labelledby="investment">
            <div class="row">
                <div class="col-sm-12">
                    <table id="" class="table datatable table-striped table-bordered nowrap" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>S/N</th>
                            <th>ID</th>
                            <th>FULL NAME</th>
                            <th>EMAIL ADDRESS</th>
                            <th>PLAN</th>
                            <th>SUBSCRIBE DATE</th>
                            <th>DUE DATE</th>
                            <th>Controls</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($investment->all() as $i => $user)
                            <tr class="d{{$user->id}}">
                                <td class="red">{{$i+1}}</td>
                                <td class="red">{{$user->id}}</td>
                                <td>{{$user->full_name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->sub->accessTime}}</td>
                                <td>{{\Carbon\Carbon::parse($user->date_subscribed)->format('d M @ h:ia')}}</td>
                                <td>{{\Carbon\Carbon::parse($user->next_due_date)->format('d M @ h:ia')}}</td>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                            Actions
                                            <span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu pull-right" role="menu" style="background: whitesmoke; -webkit-box-shadow: inset 0px 0px 10px grey;-moz-box-shadow: inset 0px 0px 10px grey;box-shadow: inset 0px 0px 10px grey;">
                                            <li></li>
                                            <li style="cursor: pointer;"><a class="userdetails" href="{{$user->id}}" data-target="#userdetails" data-toggle="modal">VIEW DETAILS</a></li>
                                            <li style="cursor: pointer;"><a class="updateuser" href="{{$user->id}}" data-target="#updateuserinfo" data-toggle="modal">EDIT/UPDATE</a></li>
                                            <li style="cursor: pointer;"><a class="upgradeuser" href="{{$user->id}}" data-target="#upgradeuser" data-toggle="modal"><span class="fa fa-credit-card"></span> UPGRADE ACCOUNT</a></li>
                                            
                                            <li class="divider"></li>
                                            @if($user->flag=='0')
                                                <li style="cursor: pointer;"><a class="flaguser" href="{{$user->id}}" id="f{{$user->id}}">FLAG USER</a>
                                            @else
                                                <li style="cursor: pointer;"><a class="unflaguser" href="{{$user->id}}" id="f{{$user->id}}"><span style="color: red;">UNFLAG USER</span></a>
                                            @endif
                                            @if($user->status=='0')
                                                <li style="cursor: pointer;"><a class="disableuser" href="{{$user->id}}" id="h{{$user->id}}">DISABLE USER</a>
                                            @else
                                                <li style="cursor: pointer;"><a class="enableuser" href="{{$user->id}}" id="h{{$user->id}}"><span style="color: green;">ENABLE USER</span></a>
                                            @endif
                                            <li style="cursor: pointer;"><a class="userdelete" href="{{$user->id}}" data-target="#userdelete" data-toggle="modal">DELETE USER</a>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>





        <div role="tabpanel" class="tab-pane fade" id="today_vip_ticket" aria-labelledby="profile-tab">
            <div class="row">
                <div class="col-sm-12">
                    <table id="" class="table datatable table-striped table-bordered nowrap" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>S/N</th>
                            <th>ID</th>
                            <th>FULL NAME</th>
                            <th>EMAIL ADDRESS</th>
                            <th>PLAN</th>
                            <th>SUBSCRIBE DATE</th>
                            <th>DUE DATE</th>
                            <th>Controls</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($tvt->all() as $i => $user)
                            <tr class="d{{$user->id}}">
                                <td class="red">{{$i+1}}</td>
                                <td class="red">{{$user->id}}</td>
                                <td>{{$user->full_name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->sub->accessTime}}</td>
                                <td>{{\Carbon\Carbon::parse($user->date_subscribed)->format('d M @ h:ia')}}</td>
                                <td>{{\Carbon\Carbon::parse($user->next_due_date)->format('d M @ h:ia')}}</td>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                            Actions
                                            <span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu pull-right" role="menu" style="background: whitesmoke; -webkit-box-shadow: inset 0px 0px 10px grey;-moz-box-shadow: inset 0px 0px 10px grey;box-shadow: inset 0px 0px 10px grey;">
                                            <li></li>
                                            <li style="cursor: pointer;"><a class="userdetails" href="{{$user->id}}" data-target="#userdetails" data-toggle="modal">VIEW DETAILS</a></li>
                                            <li style="cursor: pointer;"><a class="updateuser" href="{{$user->id}}" data-target="#updateuserinfo" data-toggle="modal">EDIT/UPDATE</a></li>
                                            <li style="cursor: pointer;"><a class="upgradeuser" href="{{$user->id}}" data-target="#upgradeuser" data-toggle="modal"><span class="fa fa-credit-card"></span> UPGRADE ACCOUNT</a></li>
                                            
                                            <li class="divider"></li>
                                            @if($user->flag=='0')
                                                <li style="cursor: pointer;"><a class="flaguser" href="{{$user->id}}" id="f{{$user->id}}">FLAG USER</a>
                                            @else
                                                <li style="cursor: pointer;"><a class="unflaguser" href="{{$user->id}}" id="f{{$user->id}}"><span style="color: red;">UNFLAG USER</span></a>
                                            @endif
                                            @if($user->status=='0')
                                                <li style="cursor: pointer;"><a class="disableuser" href="{{$user->id}}" id="h{{$user->id}}">DISABLE USER</a>
                                            @else
                                                <li style="cursor: pointer;"><a class="enableuser" href="{{$user->id}}" id="h{{$user->id}}"><span style="color: green;">ENABLE USER</span></a>
                                            @endif
                                            <li style="cursor: pointer;"><a class="userdelete" href="{{$user->id}}" data-target="#userdelete" data-toggle="modal">DELETE USER</a>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div role="tabpanel" class="tab-pane fade" id="today_vvip_ticket" aria-labelledby="profile-tab">
            <div class="row">
                <div class="col-sm-12">
                    <table id="" class="table datatable table-striped table-bordered nowrap" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>S/N</th>
                            <th>ID</th>
                            <th>FULL NAME</th>
                            <th>EMAIL ADDRESS</th>
                            <th>PLAN</th>
                            <th>SUBSCRIBE DATE</th>
                            <th>DUE DATE</th>
                            <th>Controls</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($tvvt->all() as $i => $user)
                            <tr class="d{{$user->id}}">
                                <td class="red">{{$i+1}}</td>
                                <td class="red">{{$user->id}}</td>
                                <td>{{$user->full_name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->sub->accessTime}}</td>
                                <td>{{\Carbon\Carbon::parse($user->date_subscribed)->format('d M @ h:ia')}}</td>
                                <td>{{\Carbon\Carbon::parse($user->next_due_date)->format('d M @ h:ia')}}</td>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                            Actions
                                            <span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu pull-right" role="menu" style="background: whitesmoke; -webkit-box-shadow: inset 0px 0px 10px grey;-moz-box-shadow: inset 0px 0px 10px grey;box-shadow: inset 0px 0px 10px grey;">
                                            <li></li>
                                            <li style="cursor: pointer;"><a class="userdetails" href="{{$user->id}}" data-target="#userdetails" data-toggle="modal">VIEW DETAILS</a></li>
                                            <li style="cursor: pointer;"><a class="updateuser" href="{{$user->id}}" data-target="#updateuserinfo" data-toggle="modal">EDIT/UPDATE</a></li>
                                            <li style="cursor: pointer;"><a class="upgradeuser" href="{{$user->id}}" data-target="#upgradeuser" data-toggle="modal"><span class="fa fa-credit-card"></span> UPGRADE ACCOUNT</a></li>
                                            
                                            <li class="divider"></li>
                                            @if($user->flag=='0')
                                                <li style="cursor: pointer;"><a class="flaguser" href="{{$user->id}}" id="f{{$user->id}}">FLAG USER</a>
                                            @else
                                                <li style="cursor: pointer;"><a class="unflaguser" href="{{$user->id}}" id="f{{$user->id}}"><span style="color: red;">UNFLAG USER</span></a>
                                            @endif
                                            @if($user->status=='0')
                                                <li style="cursor: pointer;"><a class="disableuser" href="{{$user->id}}" id="h{{$user->id}}">DISABLE USER</a>
                                            @else
                                                <li style="cursor: pointer;"><a class="enableuser" href="{{$user->id}}" id="h{{$user->id}}"><span style="color: green;">ENABLE USER</span></a>
                                            @endif
                                            <li style="cursor: pointer;"><a class="userdelete" href="{{$user->id}}" data-target="#userdelete" data-toggle="modal">DELETE USER</a>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div role="tabpanel" class="tab-pane fade" id="today_ordinary_ticket" aria-labelledby="investment">
            <div class="row">
                <div class="col-sm-12">
                    <table id="" class="table datatable table-striped table-bordered nowrap" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>S/N</th>
                            <th>ID</th>
                            <th>FULL NAME</th>
                            <th>EMAIL ADDRESS</th>
                            <th>PLAN</th>
                            <th>SUBSCRIBE DATE</th>
                            <th>DUE DATE</th>
                            <th>Controls</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($tot->all() as $i => $user)
                            <tr class="d{{$user->id}}">
                                <td class="red">{{$i+1}}</td>
                                <td class="red">{{$user->id}}</td>
                                <td>{{$user->full_name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->sub->accessTime}}</td>
                                <td>{{\Carbon\Carbon::parse($user->date_subscribed)->format('d M @ h:ia')}}</td>
                                <td>{{\Carbon\Carbon::parse($user->next_due_date)->format('d M @ h:ia')}}</td>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                            Actions
                                            <span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu pull-right" role="menu" style="background: whitesmoke; -webkit-box-shadow: inset 0px 0px 10px grey;-moz-box-shadow: inset 0px 0px 10px grey;box-shadow: inset 0px 0px 10px grey;">
                                            <li></li>
                                            <li style="cursor: pointer;"><a class="userdetails" href="{{$user->id}}" data-target="#userdetails" data-toggle="modal">VIEW DETAILS</a></li>
                                            <li style="cursor: pointer;"><a class="updateuser" href="{{$user->id}}" data-target="#updateuserinfo" data-toggle="modal">EDIT/UPDATE</a></li>
                                            <li style="cursor: pointer;"><a class="upgradeuser" href="{{$user->id}}" data-target="#upgradeuser" data-toggle="modal"><span class="fa fa-credit-card"></span> UPGRADE ACCOUNT</a></li>
                                            
                                            <li class="divider"></li>
                                            @if($user->flag=='0')
                                                <li style="cursor: pointer;"><a class="flaguser" href="{{$user->id}}" id="f{{$user->id}}">FLAG USER</a>
                                            @else
                                                <li style="cursor: pointer;"><a class="unflaguser" href="{{$user->id}}" id="f{{$user->id}}"><span style="color: red;">UNFLAG USER</span></a>
                                            @endif
                                            @if($user->status=='0')
                                                <li style="cursor: pointer;"><a class="disableuser" href="{{$user->id}}" id="h{{$user->id}}">DISABLE USER</a>
                                            @else
                                                <li style="cursor: pointer;"><a class="enableuser" href="{{$user->id}}" id="h{{$user->id}}"><span style="color: green;">ENABLE USER</span></a>
                                            @endif
                                            <li style="cursor: pointer;"><a class="userdelete" href="{{$user->id}}" data-target="#userdelete" data-toggle="modal">DELETE USER</a>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>





        <div role="tabpanel" class="tab-pane fade" id="friday_ticket" aria-labelledby="profile-tab">
            <div class="row">
                <div class="col-sm-12">
                    <table id="" class="table datatable table-striped table-bordered nowrap" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>S/N</th>
                            <th>ID</th>
                            <th>FULL NAME</th>
                            <th>EMAIL ADDRESS</th>
                            <th>PLAN</th>
                            <th>SUBSCRIBE DATE</th>
                            <th>DUE DATE</th>
                            <th>Controls</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($frivt->all() as $i => $user)
                            <tr class="d{{$user->id}}">
                                <td class="red">{{$i+1}}</td>
                                <td class="red">{{$user->id}}</td>
                                <td>{{$user->full_name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->sub->accessTime}}</td>
                                <td>{{\Carbon\Carbon::parse($user->date_subscribed)->format('d M @ h:ia')}}</td>
                                <td>{{\Carbon\Carbon::parse($user->next_due_date)->format('d M @ h:ia')}}</td>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                            Actions
                                            <span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu pull-right" role="menu" style="background: whitesmoke; -webkit-box-shadow: inset 0px 0px 10px grey;-moz-box-shadow: inset 0px 0px 10px grey;box-shadow: inset 0px 0px 10px grey;">
                                            <li></li>
                                            <li style="cursor: pointer;"><a class="userdetails" href="{{$user->id}}" data-target="#userdetails" data-toggle="modal">VIEW DETAILS</a></li>
                                            <li style="cursor: pointer;"><a class="updateuser" href="{{$user->id}}" data-target="#updateuserinfo" data-toggle="modal">EDIT/UPDATE</a></li>
                                            <li style="cursor: pointer;"><a class="upgradeuser" href="{{$user->id}}" data-target="#upgradeuser" data-toggle="modal"><span class="fa fa-credit-card"></span> UPGRADE ACCOUNT</a></li>
                                            
                                            <li class="divider"></li>
                                            @if($user->flag=='0')
                                                <li style="cursor: pointer;"><a class="flaguser" href="{{$user->id}}" id="f{{$user->id}}">FLAG USER</a>
                                            @else
                                                <li style="cursor: pointer;"><a class="unflaguser" href="{{$user->id}}" id="f{{$user->id}}"><span style="color: red;">UNFLAG USER</span></a>
                                            @endif
                                            @if($user->status=='0')
                                                <li style="cursor: pointer;"><a class="disableuser" href="{{$user->id}}" id="h{{$user->id}}">DISABLE USER</a>
                                            @else
                                                <li style="cursor: pointer;"><a class="enableuser" href="{{$user->id}}" id="h{{$user->id}}"><span style="color: green;">ENABLE USER</span></a>
                                            @endif
                                            <li style="cursor: pointer;"><a class="userdelete" href="{{$user->id}}" data-target="#userdelete" data-toggle="modal">DELETE USER</a>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div role="tabpanel" class="tab-pane fade" id="saturday_ticket" aria-labelledby="profile-tab">
            <div class="row">
                <div class="col-sm-12">
                    <table id="" class="table datatable table-striped table-bordered nowrap" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>S/N</th>
                            <th>ID</th>
                            <th>FULL NAME</th>
                            <th>EMAIL ADDRESS</th>
                            <th>PLAN</th>
                            <th>SUBSCRIBE DATE</th>
                            <th>DUE DATE</th>
                            <th>Controls</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($satvt->all() as $i => $user)
                            <tr class="d{{$user->id}}">
                                <td class="red">{{$i+1}}</td>
                                <td class="red">{{$user->id}}</td>
                                <td>{{$user->full_name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->sub->accessTime}}</td>
                                <td>{{\Carbon\Carbon::parse($user->date_subscribed)->format('d M @ h:ia')}}</td>
                                <td>{{\Carbon\Carbon::parse($user->next_due_date)->format('d M @ h:ia')}}</td>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                            Actions
                                            <span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu pull-right" role="menu" style="background: whitesmoke; -webkit-box-shadow: inset 0px 0px 10px grey;-moz-box-shadow: inset 0px 0px 10px grey;box-shadow: inset 0px 0px 10px grey;">
                                            <li></li>
                                            <li style="cursor: pointer;"><a class="userdetails" href="{{$user->id}}" data-target="#userdetails" data-toggle="modal">VIEW DETAILS</a></li>
                                            <li style="cursor: pointer;"><a class="updateuser" href="{{$user->id}}" data-target="#updateuserinfo" data-toggle="modal">EDIT/UPDATE</a></li>
                                            <li style="cursor: pointer;"><a class="upgradeuser" href="{{$user->id}}" data-target="#upgradeuser" data-toggle="modal"><span class="fa fa-credit-card"></span> UPGRADE ACCOUNT</a></li>
                                            
                                            <li class="divider"></li>
                                            @if($user->flag=='0')
                                                <li style="cursor: pointer;"><a class="flaguser" href="{{$user->id}}" id="f{{$user->id}}">FLAG USER</a>
                                            @else
                                                <li style="cursor: pointer;"><a class="unflaguser" href="{{$user->id}}" id="f{{$user->id}}"><span style="color: red;">UNFLAG USER</span></a>
                                            @endif
                                            @if($user->status=='0')
                                                <li style="cursor: pointer;"><a class="disableuser" href="{{$user->id}}" id="h{{$user->id}}">DISABLE USER</a>
                                            @else
                                                <li style="cursor: pointer;"><a class="enableuser" href="{{$user->id}}" id="h{{$user->id}}"><span style="color: green;">ENABLE USER</span></a>
                                            @endif
                                            <li style="cursor: pointer;"><a class="userdelete" href="{{$user->id}}" data-target="#userdelete" data-toggle="modal">DELETE USER</a>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div role="tabpanel" class="tab-pane fade" id="sunday_ticket" aria-labelledby="investment">
            <div class="row">
                <div class="col-sm-12">
                    <table id="" class="table datatable table-striped table-bordered nowrap" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>S/N</th>
                            <th>ID</th>
                            <th>FULL NAME</th>
                            <th>EMAIL ADDRESS</th>
                            <th>PLAN</th>
                            <th>SUBSCRIBE DATE</th>
                            <th>DUE DATE</th>
                            <th>Controls</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($sunvt->all() as $i => $user)
                            <tr class="d{{$user->id}}">
                                <td class="red">{{$i+1}}</td>
                                <td class="red">{{$user->id}}</td>
                                <td>{{$user->full_name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->sub->accessTime}}</td>
                                <td>{{\Carbon\Carbon::parse($user->date_subscribed)->format('d M @ h:ia')}}</td>
                                <td>{{\Carbon\Carbon::parse($user->next_due_date)->format('d M @ h:ia')}}</td>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                            Actions
                                            <span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu pull-right" role="menu" style="background: whitesmoke; -webkit-box-shadow: inset 0px 0px 10px grey;-moz-box-shadow: inset 0px 0px 10px grey;box-shadow: inset 0px 0px 10px grey;">
                                            <li></li>
                                            <li style="cursor: pointer;"><a class="userdetails" href="{{$user->id}}" data-target="#userdetails" data-toggle="modal">VIEW DETAILS</a></li>
                                            <li style="cursor: pointer;"><a class="updateuser" href="{{$user->id}}" data-target="#updateuserinfo" data-toggle="modal">EDIT/UPDATE</a></li>
                                            <li style="cursor: pointer;"><a class="upgradeuser" href="{{$user->id}}" data-target="#upgradeuser" data-toggle="modal"><span class="fa fa-credit-card"></span> UPGRADE ACCOUNT</a></li>
                                            
                                            <li class="divider"></li>
                                            @if($user->flag=='0')
                                                <li style="cursor: pointer;"><a class="flaguser" href="{{$user->id}}" id="f{{$user->id}}">FLAG USER</a>
                                            @else
                                                <li style="cursor: pointer;"><a class="unflaguser" href="{{$user->id}}" id="f{{$user->id}}"><span style="color: red;">UNFLAG USER</span></a>
                                            @endif
                                            @if($user->status=='0')
                                                <li style="cursor: pointer;"><a class="disableuser" href="{{$user->id}}" id="h{{$user->id}}">DISABLE USER</a>
                                            @else
                                                <li style="cursor: pointer;"><a class="enableuser" href="{{$user->id}}" id="h{{$user->id}}"><span style="color: green;">ENABLE USER</span></a>
                                            @endif
                                            <li style="cursor: pointer;"><a class="userdelete" href="{{$user->id}}" data-target="#userdelete" data-toggle="modal">DELETE USER</a>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection
