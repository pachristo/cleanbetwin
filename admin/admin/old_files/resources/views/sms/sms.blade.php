@extends('layouts.master')

@section('title')
    CLEANODDS | BULK SMSing
@endsection
@section('page')
    Send Bulk SMS 
    @if($title=='active')
    |<strong>Active Users </strong>
    @elseif($title=='inactive')
    |<strong>Inactive users</strong>
    @else
    |<strong>All Users</strong>
    @endif
@endsection
@section('content')
    <div class="col" style="min-height: 323px;;">
        <br>

        <div class="row" style="margin-top: -20px;">
            <div class="col-sm-12">
                @if( session()->has('message1'))
                    <div class="alert alert-success">
                        {{session('message1')}}
                    </div>
                @endif
                <span>{{$page ?? ''}}</span>

            
                @if(session('data1')!='' )
                    <div class="alert alert-danger">
                       Could not send message to the following numbers; <br>
                       <input type="text" name="" class="form-control" value="{{session('data1')}}">

                    </div>
                @endif
                @if( session()->has('message2'))
                    <div class="alert alert-success">
                        {{session('message2')}}
                    </div>
                @endif
                
                @if(session('data2')!='' )
                    <div class="alert alert-danger">
                       Could not send message to the following numbers; <br>
                       <input type="text" name="" class="form-control" value="{{session('data2')}}">

                    </div>
                @endif
                @if( session()->has('message3'))
                    <div class="alert alert-success">
                        {{session('message3')}}
                    </div>
                @endif
                
                @if(session('data3')!='' )
                    <div class="alert alert-danger">
                       Could not send message to the following numbers; <br>
                       <input type="text" name="" class="form-control" value="{{session('data3')}}">

                    </div>
                @endif
            </div>
            @if($title=='active')
            <form method="POST" action="{{url('/sms')}}" >
            @elseif($title=='inactive')
            <form method="POST" action="{{url('/sendInactive')}}" >
            @else
            <form method="POST" action="{{url('/sendGeneral')}}" >
            @endif

            @if ($errors->any())
            <div class="alert alert-danger">
                 <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
                <div class="col-md-12"><br>
                    <div class="form-group col-sm-12">
                        <label>PHONE NUMBERS</label>
                        <input type="text" name="numbers" class="form-control" value="{{$bulk}}">
                    </div>
                    {{-- <div class="form-group col-sm-12">
                        <br>
                        <label>SENDER ID</label>
                        <input type="text" class="form-control" name="sender" value="R3BET" required placeholder="Sender ID here">
                    </div>
                    --}}
                    <div class="form-group col-sm-12">
                        <br>
                        <label for="moreoption">SMS CONTENT</label>
                        <textarea name="message" id="message" required class="form-control" rows="10"></textarea>
                    </div>

                    {!! csrf_field() !!}

                    <div id="bstatus" class="col-xs-6"></div>
                    <div class="form-group col-sm-12">
                        <hr style="margin: 15px;">
                        <button type="submit" class="btn btn-md btn-success" name="submit" >SEND SMS</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection

{{-- @section('levelJS')
    <script>
        $('#smsForm').submit(function(e){
            e.preventDefault();
            $('#smsBtn').prop('disabled', true).html("Sending SMS");
            var url = $(this).attr('action');
            var dataString = $(this).serialize();
            $.ajax({
                type: "POST",
                url: url,
                data: dataString,
                dataType: "JSON",
                success: function(data){
                    if (data.status == 1) {
                        $('#smsBtn').prop('disabled', false).html("SEND SMS");
                        swal(data.encounters, '', 'warning');
                    }
                    else{
                        swal("SMS DISPATCHED SUCCESSFULLY", '', 'success');
                        $('#smsBtn').prop('disabled', false).html("SEND SMS");
                        $('#smsForm')[0].reset();
                    }
                },
                error: function (e, status) {
                    if (e.status == 500)
                        console.log(e.Message);
                    $('#smsBtn').prop('disabled', false).html("SEND SMS");
                    swal('Something is broken!','','warning');
                    // location.reload();
                }
            });
        });
    </script>
@endsection --}}
