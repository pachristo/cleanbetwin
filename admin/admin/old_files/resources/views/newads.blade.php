@extends('layouts.master')

@section('title')
    CLEANODDS | Image Advertisement
@endsection
@section('page')
    New Ads
@endsection
@section('content')
    <div class="col">
        <br>
        <?php
        $date = new dateTime();
        $d = $date->format('j F, Y');
        ?>
        @if(isset($success))
            <script>
                alert('{{$success}}');
            </script>
        @endif

        <form action="{{route('/newAds')}}" method="POST" id="adsForm" enctype="multipart/form-data">
            <div class="row">
                <div class="col-sm-10 col-md-offset-1">

                <div class="col-md-4">
                    {{--<label>ADs IMAGE</label>--}}
                    <div class="fileupload fileupload-new" data-provides="fileupload">
                        <div class="fileupload-new thumbnail" style="width: 250px; height: 150px;"><img src="{{asset('images/demoUpload.jpg')}}" alt="" /></div>
                        <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 160px; max-height: 150px; line-height: 20px;"></div>
                        <div>
                <span class="btn btn-sm btn-file btn-danger"><span class="fileupload-new">SELECT AD IMAGE</span><span class="fileupload-exists">Change</span>
                <input type="file" name="file" required/></span>
                            <a href="#" class="btn btn-sm btn-danger fileupload-exists" data-dismiss="fileupload">Remove</a>
                        </div>
                    </div>
                </div>

            <div class="col-md-8">
                <div class="form-group col-sm-4">
                    <label>ADS TYPE</label>
                    <select name="position" class="form-control" required>
                        <option value="">*_*_*_*_*_*_*_*</option>
                        <option value="Square">Square Banner</option>
                        <option value="Rectangle">Rectangle Banner</option>
                    </select>
                </div>

                <div class="form-group col-sm-8">
                    <label>ADS POSITION</label>
                    <select name="location" class="form-control" required>
                        <option value="">*_*_*_*_*_*_*_*</option>
                        <option value="ad1">Top Header : 300 x 250px (Desktop & Mobile)</option>
                        <option value="ad2a">Above Free Pick A : 728 x 90px (Desktop Only)</option>
                        <option value="ad2b">Above Free Pick B : 300 x 250px (Mobile Only)</option>
                        <option value="ad3a">Above Visit Focus Predict A : 940 x 90px (Desktop Only)</option>
                        <option value="ad3b">Above Visit Focus Predict B : 300 x 250px (Mobile Only)</option>
                        <option value="ad4">Below Upcoming Tips : 300 x 250px (Desktop & Mobile)</option>
                        <option value="ad5a">Above Tips Stores A : 940 x 90px (Desktop Only)</option>
                        <option value="ad5b">Above Tips Stores B : 300 x 25px (Mobile Only)</option>
                        <option value="ad6a">In Categories A : 940 x 90px (Desktop Only)</option>
                        <option value="ad6b">In Categories B : 300 x 25px (Mobile Only)</option>
                    </select>
                </div>

                <div class="form-group col-sm-12">
                    <label>WEBSITE URL (if any)</label>
                    <input class="form-control" name="url" placeholder="URL here">
                </div>

                    {{--<div class="form-group col-sm-4">--}}
                        {{--<label>DISPLAY CONTROL</label>--}}
                        {{--<select name="displaycontrol" class="form-control" required>--}}
                            {{--<option value="1">Hide on PC/Show Mobile</option>--}}
                            {{--<option value="2">Hide on Mobile/Show PC</option>--}}
                            {{--<option value="0" selected>Show on All</option>--}}
                        {{--</select>--}}
                    {{--</div>--}}

                    {!! csrf_field() !!}
                    <div class="form-group col-sm-12">
                        <button class="btn btn-md btn-success" name="submit" id="adsBtn">UPLOAD AD</button>
                    </div>

                </div>
                </div>

            </div>
        </form>
        <hr>

        <table id="datatable" class="table table-striped table-bordered nowrap" cellspacing="0" width="100%">
            <thead>
            <tr>
                <th>REL</th>
                <th>TYPE</th>
                <th>POSITION</th>
                <th>THUMBNAIL</th>
                <th>LINK URL</th>
                {{--<th>DISPLAY</th>--}}

                <th>Controls</th>
            </tr>
            </thead>
            <tbody>
            @foreach($ads->all() as $ad)
                <tr id="d{{$ad->id}}">
                    <td class="red">{{$ad->id}}</td>
                    <td>{{$ad->position}}</td>
                    <td>
                        @if($ad->location=='ad1')
                            Top Header : 300 x 250px (Desktop & Mobile)
                        @elseif($ad->location=='ad2a')
                            Above Free Pick A : 728 x 90px (Desktop Only)
                        @elseif($ad->location=='ad2b')
                            Above Free Pick B : 300 x 250px (Mobile Only)
                        @elseif($ad->location=='ad3a')
                            Above Visit Focus Predict A : 940 x 90px (Desktop Only)
                        @elseif($ad->location=='ad3b')
                            Above Visit Focus Predict B : 300 x 250px (Mobile Only)
                        @elseif($ad->location=='ad4')
                            Below Upcoming Tips : 300 x 250px (Desktop & Mobile)
                        @elseif($ad->location=='ad5a')
                            Above Tips Stores A : 940 x 90px (Desktop Only)
                        @elseif($ad->location=='ad5b')
                            Above Tips Stores B : 300 x 25px (Mobile Only)
                        @elseif($ad->location=='ad6a')
                            In Categories A : 940 x 90px (Desktop Only)
                        @elseif($ad->location=='ad6b')
                            In Categories B : 300 x 25px (Mobile Only)
                        @endif
                    </td>
                    <td><a href="{{asset('images/ads')}}/{{$ad->ads_image}}" target="_blank">
                            <center><img src="{{asset('images/ads')}}/{{$ad->ads_image}}" style="max-height: 50px;" class="img-responsive" alt=""></center>
                        </a></td>
                    <td>{{$ad->website}}</td>
                    {{--<td>--}}
                        {{--@if($ad->other=='1')--}}
                            {{--Hide on PC/Show Mobile--}}
                        {{--@elseif($ad->other=='2')--}}
                            {{--Hide on Mobile/Show PC--}}
                        {{--@else--}}
                            {{--Show on All--}}
                        {{--@endif--}}
                    {{--</td>--}}

                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                Actions
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu pull-right" role="menu" style="background: whitesmoke; -webkit-box-shadow: inset 0px 0px 10px grey;-moz-box-shadow: inset 0px 0px 10px grey;box-shadow: inset 0px 0px 10px grey;">
                                {{--<li style="cursor: pointer;"><a class="updateads" href="{{$ad->id}}" data-target="#updateads" data-toggle="modal">EDIT/UPDATE</a>--}}


                                @if($ad->status=='0')
                                    <li style="cursor: pointer;"><a class="hidead" href="{{$ad->id}}" id="h{{$ad->id}}">HIDE THIS</a>
                                @else
                                    <li style="cursor: pointer;"><a class="unhidead" href="{{$ad->id}}" id="h{{$ad->id}}"><span style="color: green;">SHOW THIS</span></a>
                                @endif

                                <li style="cursor: pointer;"><a class="adsdelete" href="{{route('/adDelete')}}" data-id="{{$ad->id}}">DELETE</a>
                                </li>
                            </ul>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>


@endsection
