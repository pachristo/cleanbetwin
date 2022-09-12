<div class="container-fluid">
    <br>
    <div class="col-sm-6">
        @if($user->passport!=NULL)
            <img src="{{$path1}}{{$user->passport}}" class="img-rounded" style="max-height: 120px;">
        @elseif($user->avatar!=NULL)
            <img src="{{$user->avatar}}" class="img-rounded" style="max-height: 120px;">
        @else
            <img src="{{$path}}user.png" class="img-rounded" style="max-height: 120px;">
        @endif
        <table class="table table-striped table-hover">
            <tr>
                <th> STATUS</th>
                <td>
                   
                    @if($user->sms_due_date<date('Y-m-d H:i:s'))
                        <span class="text-danger">EXPIRED</span>
                    @else
                        <span class="text-success">ACTIVE</span>
                    @endif
                </td>
            </tr>
       {{--      @if($user->subscription_status=='1') --}}
                <tr>
                    <th>SUBSCRIPTION TYPE</th>
                    <td>{{$user->sms_cat}} </td>
                </tr>
           {{--  @endif --}}
            <tr>
                <th>LAST SUBSCRIPTION</th>
                <td>{{\Carbon\Carbon::parse($user->sms_subscribed_date)->format('l j M, Y : h ia')}}</td>
            </tr>
{{--            @if($user->subscription_status=='1')--}}
                <tr>
                    <th>NEXT DUE DATE</th>
                    <td>{{\Carbon\Carbon::parse($user->sms_due_date)->format('l j M, Y : h ia')}}</td>
                </tr>
            {{--@endif--}}
           {{--  <tr>
                <th>SUBSCRIPTION COUNT</th>
                <td>{{$user->sub_count}}</td>
            </tr> --}}
        </table>

    </div>
    <div class="col-sm-6">
        <table class="table table-striped table-hover">
            <tr>
                <th>FULL NAME</th>
                <td>{{$user->full_name}}</td>
            </tr>
            
            <tr>
                <th>EMAIL ADDRESS</th>
                <td>{{$user->email}}</td>
            </tr>
            @if($user->phone!=NULL)
                <tr>
                    <th>PHONE NUMBER</th>
                    <td>{{$user->phone}}
                       
                        @if($user->phone_status=='0')
                        <span class="text-warning" style="color:orange;">  Unverified</span>
                        @else
                        <span class="text-success">✔Verified</span>
                        @endif
                        


                    </td>
                </tr>
                <tr>
                <th>Country Code</th>
                <td>{{$user->country_code}}</td>
            </tr>
            @endif
            @if($user->state!=NULL)
                <tr>
                    <th>STATE</th>
                    <td>{{$user->state}}</td>
                </tr>
            @endif
            @if($user->country!=NULL)
                <tr>
                    <th>COUNTRY</th>
                    <td>{{$user->country}}</td>
                </tr>
            @endif
        </table>
    </div>

</div>
