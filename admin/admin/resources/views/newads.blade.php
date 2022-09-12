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
                <input type="file" name="file" /></span>
                            <a href="#" class="btn btn-sm btn-danger fileupload-exists" data-dismiss="fileupload">Remove</a>
                        </div>
                    </div>
                </div>

            <div class="col-md-8">
                <div class="form-group col-sm-4">
                    <label>ADS TYPE</label>
                    <select name="position" class="form-control" required>
                        <option value="">*_*_*_*_*_*_*_*</option>
                        <option value="image">Image Ads</option>
                        <option value="code">Code Ads</option>
                    </select>
                </div>

                <div class="form-group col-sm-8">
                    <label>ADS POSITION</label>
                    <select name="location" class="form-control" required>
                        <option value="">*_*_*_*_*_*_*_*</option>
                        <optgroup label="IMAGE ADVERT">
                            <option value="ad1">Top Header : 728px x  90px (IMAGE ONLY) (Desktop only)</option>
                       

                            <option value="first_ads">Under announcement Homepage : 728 x 90px (IMAGE ONLY) (Desktop Only)</option>
                            <option value="mfirst_ads">Under announcement Homepage : 300 x 250px (IMAGE ONLY) (mobile Only)</option>                    
                            <option value="utest">Under Testimonial Homepage : 728 x 90px (IMAGE ONLY) (Desktop Only)</option>
                            <option value="mutest">Under Testimonial Homepage : 300 x 250px (IMAGE ONLY) (mobile Only)</option>                    
                           
                            <option value="invest_ads">Above Investment Homepage : 728 x 90px(IMAGE ONLY)  (Desktop Only)</option>
                            <option value="minvest_ads">Above Investment : 300 x 250px (IMAGE ONLY) (mobile Only)</option>
                            <option value="uinv">Under Investment Homepage : 728 x 90px (IMAGE ONLY) (Desktop Only)</option>
                            <option value="muinv">Under Investment : 300 x 250px (IMAGE ONLY) (mobile Only)</option>
                         
                            <option value="ustore">Under Tips Store Homepage : 728 x 90px (IMAGE ONLY) (Desktop Only)</option>
                            <option value="mustore">Under Tips Store Homepage : 300 x 250px (IMAGE ONLY) (mobile Only)</option>
    
                         
    
                            <option value="catstore">Category page : 728 x 90px (IMAGE ONLY)  (Desktop Only)</option>
                            <option value="mcatstore">Category page : 300 x 250px (IMAGE ONLY) (mobile Only)</option>
                            <option value="bfreetips">Beside Free Tips Homepage : 300 x 250px (IMAGE ONLY) (Desktop Only)</option>
    
       <option value="sidebar1">SideBar left :90px  x 728px (IMAGE) (Desktop Only)</option>
                    <option value="sidebar2">SideBar right :90px  x 728px (IMAGE) (Desktop Only)</option>
                    
                    
                          <option value="float_bottom_ads">Floating Bottom Ads :728 x 90px (IMAGE) (Desktop Only)</option>
                    
                        </optgroup>
                      <optgroup label="CODE ADVERTS">
                                      <option value="code_ad1">Top Header : 728px x  90px (CODE) (Desktop only)</option>
                        <option value="code_first_ads">Under announcement Homepage : 728 x 90px (CODE) (Desktop Only)</option>
                        <option value="code_mfirst_ads">Under announcement Homepage : 300 x 250px (CODE) (mobile Only)</option>
                        <option value="code_utest">Under Testimonial Homepage : 728 x 90px (CODE) (Desktop Only)</option>
                        <option value="code_mutest">Under Testimonial Homepage : 300 x 250px (CODE) (mobile Only)</option>
    <option value="code_invest_ads">Above Investment Homepage : 728 x 90px (CODE) (Desktop Only)</option>
                        <option value="code_minvest_ads">Above Investment : 300 x 250px  (CODE) (mobile Only)</option>
                        <option value="code_uinv">Under Investment Homepage : 728 x 90px (CODE) (Desktop Only)</option>
                        <option value="code_muinv">Under Investment : 300 x 250px (CODE) (mobile Only)</option>
                        <option value="code_ustore">Under Tips Store Homepage : 728 x 90px (CODE) (Desktop Only)</option>
                        <option value="code_mustore">Under Tips Store Homepage : 300 x 250px (CODE) (mobile Only)</option>

                        <option value="code_catstore">Category page : 728 x 90px (CODE) (Desktop Only)</option>
                        <option value="code_mcatstore">Category page : 300 x 250px (CODE) (mobile Only)</option>
                        <option value="code_bfreetips">Beside Free Tips Homepage : 300 x 250px (CODE) (Desktop Only)</option>
                         <option value="code_float_bottom_ads">Floating Bottom Ads :728 x 90px (CODE) (Desktop Only)</option>
                     

                      </optgroup>

                    
            
                    </select>
                </div>

                <div class="form-group col-sm-4">
                    <label>WEBSITE URL (if any)</label>
                    <input class="form-control" name="url" placeholder="URL here">
                </div>
                <div class="form-group col-lg-8">
                    <label>CODE</label>
                    <textarea style="width:500px;height:180px" name="code"></textarea>
                </div>
                   
                                <input name="country" type="hidden" value="All">
              
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
                <th>COUNTRY</th>
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
                            Top Header : 300 x 250px  (IMAGE ONLY)  (Desktop & Mobile)
          
                   
                            @elseif($ad->location=="first_ads")
                            Under announcement Homepage : 728 x 90px  (IMAGE ONLY) (Desktop Only)
                            @elseif($ad->location=="mfirst_ads")
                            Under announcement Homepage : 300 x 250px (IMAGE ONLY) (mobile Only)
                            @elseif($ad->location=="invest_ads")
                            Above Investment Homepage : 728 x 90px  (IMAGE ONLY) (Desktop Only)
                            @elseif($ad->location=="minvest_ads")
                            Above Investment : 300 x 250px (IMAGE ONLY) (mobile Only)

                            @elseif($ad->location=="uinv")
                            Under Investment Homepage : 728 x 90px  (IMAGE ONLY) (Desktop Only)
                            @elseif($ad->location=="muinv")
                            Under Investment : 300 x 250px (IMAGE ONLY) (mobile Only)
                            @elseif($ad->location=="ustore")
                            Under Tips Store Homepage : 728 x 90px (IMAGE ONLY) (Desktop Only)
                            @elseif($ad->location=="mustore")
                            Under Tips Store Homepage : 300 x 250px (IMAGE ONLY) (mobile Only)
                            @elseif($ad->location=="catstore")
                            Category page : 728 x 90px (IMAGE ONLY) (Desktop Only)
                            @elseif($ad->location=="mcatsore")
                            Category page : 300 x 250px (IMAGE ONLY) (mobile Only)

                            @elseif($ad->location=="bfreetips")
                            Beside Free Tips Homepage : 300 x 250px (IMAGE ONLY) (Desktop Only)
                        @endif


                        @if($ad->location=='code_ad1')
                        Top Header : 300 x 250px (CODE) (Desktop & Mobile)
      
               
                        @elseif($ad->location=="code_first_ads")
                        Under announcement Homepage : 728 x 90px (CODE) (Desktop Only)
                        @elseif($ad->location=="code_mfirst_ads")
                        Under announcement Homepage : 300 x 250px (CODE) (mobile Only)
                        @elseif($ad->location=="code_invest_ads")
                        Above Investment Homepage : 728 x 90px  (CODE) (Desktop Only)
                        @elseif($ad->location=="code_minvest_ads")
                        Above Investment : 300 x 250px (CODE) (mobile Only)

                        @elseif($ad->location=="code_uinv")
                        Under Investment Homepage : 728 x 90px  (CODE) (Desktop Only)
                        @elseif($ad->location=="code_muinv")
                        Under Investment : 300 x 250px (CODE) (mobile Only)
                        @elseif($ad->location=="code_ustore")
                        Under Tips Store Homepage : 728 x 90px (CODE) (Desktop Only)
                        @elseif($ad->location=="code_mustore")
                        Under Tips Store Homepage : 300 x 250px (CODE) (mobile Only)
                        @elseif($ad->location=="code_catstore")
                        Category page : 728 x 90px (CODE) (Desktop Only)
                        @elseif($ad->location=="code_mcatsore")
                        Category page : 300 x 250px (CODE) (mobile Only)
                        @elseif($ad->location=="utest")
                        Under Testimonial Homepage : 728 x 90px (IMAGE ONLY) (Desktop Only)
                        @elseif($ad->location=="mutest")
                        
                        Under Testimonial Homepage : 300 x 250px (IMAGE ONLY) (mobile Only)  
                        @elseif($ad->location=="code_utest")
                        Under Testimonial Homepage : 728 x 90px (Code ONLY) (Desktop Only)
                        @elseif($ad->location=="code_mutest")
                        
                        Under Testimonial Homepage : 300 x 250px (Code ONLY) (mobile Only)  
                        
                          @elseif($ad->location=="sidebar1")
                          SideBar left :90px  x 728px (IMAGE) (Desktop Only)
                          
                    @elseif($ad->location=="sidebar2")
                    
                    SideBar right :90px  x 728px (IMAGE) (Desktop Only)
                      @elseif($ad->location=="float_bottom_ads")
                      Floating Bottom Ads :728 x 90px (IMAGE) (Desktop Only)
                      
                      @elseif($ad->location=="code_float_bottom_ads")
                      Floating Bottom Ads :728 x 90px (CODE) (Desktop Only)
                      
                        @elseif($ad->location=="code_bfreetips")
                        Beside Free Tips Homepage : 300 x 250px (CODE) (Desktop Only)
                    @endif
                    </td>
                    <td style="text-align:center;">@if($ad->position!='code')
                        <a href="{{asset('images/ads')}}/{{$ad->ads_image}}" target="_blank">
                            <center><img src="{{asset('images/ads')}}/{{$ad->ads_image}}" style="max-height: 50px;" class="img-responsive" alt=""></center>
                        </a>
                        @else
                        <span style="
                            background: #ab8a7bc2;
    color: #8f2323;
    padding: 2px;
    text-align: center;
    border-radius: 6px;
                        
                        ">
                        CODE
                        </span>
                        @endif
                    </td>
                    <td>
                        @if($ad->position!='code')
                        <a href=" {{$ad->website}}" target="_blank" title="{{$ad->website}}">
                            Link

                        </a>
                       
                        @else
                        <span style="
                            background: #ab8a7bc2;
    color: #8f2323;
    padding: 2px;
    text-align: center;
    border-radius: 6px;
                        
                        ">
                        CODE
                        </span>
                        @endif



                    
                    </td>
                    <td>{{$ad->country}}</td>
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
