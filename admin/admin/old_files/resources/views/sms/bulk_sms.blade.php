@extends('layouts.master')

@section('title')
    CLEANODDS | BULK SMSing
@endsection
@section('page')
    Send Bulk SMS
@endsection
@section('content')
    <div class="col" style="min-height: 323px;;">
        <br>

        <div class="row" style="margin-top: -20px;">
            <div class="col-sm-12">
                @if( session()->has('message'))
                    <div class="alert alert-success">
                        {{session('message')}}
                    </div>
                @endif
            </div>

            @if(!empty($data))
            Couldn't Send message to the following numbers--:
            @foreach($data as $key=>$value)
            <span style="color:red">***{{$value}}</span>
            @endforeach
            @endif
        
                <div class="col-md-12"><br>
                    <div class="form-group col-sm-12">
                        <label>GHANA </label>
                        <input type="text" name="numbers" class="form-control" value="{{$ghana_numbers}}">
                    </div>
                    <div class="form-group col-sm-12">
                        <br>
                        <label>NIGERIA </label>
                        <input type="text" class="form-control" name="sender" value="{{$nigeria_numbers}}" required placeholder="">
                    </div>
                  
                    <div class="form-group col-sm-12">
                        <label>TANZANIA</label>
                        <input type="text" name="numbers" class="form-control" value="{{$tanzania_numbers}}">
                    </div>
                    <div class="form-group col-sm-12">
                        <br>
                        <label>KENYA</label>
                        <input type="text" class="form-control" name="sender" value="{{$kenya_numbers}}" required placeholder="">
                    </div>
                    
                           <div class="form-group col-sm-12">
                        <br>
                        <label>UGANDA</label>
                        <input type="text" class="form-control" name="sender" value="{{$uganda_numbers}}" required placeholder="">
                    </div>
                      <div class="form-group col-sm-12">
                        <br>
                        <label>Others</label>
                        <input type="text" class="form-control" name="sender" value="{{$other_numbers}}" required placeholder="">
                    </div>

                    

                 

                    <div id="bstatus" class="col-xs-6"></div>
                    <!--<div class="form-group col-sm-12">-->
                    <!--    <hr style="margin: 15px;">-->
                    <!--    <button class="btn btn-md btn-success" id="smsBtn">SEND SMS</button>-->
                    <!--</div>-->
                </div>
            
        </div>
    </div>

@endsection

@section('levelJS')
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
@endsection


