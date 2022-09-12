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
                @if( session()->has('success'))
                    <div class="alert alert-success">
                        {{session('success')}}
                    </div>
                @endif
            </div>

            <form method="POST" action="{{url('/sms')}}" id="smsForm">
                <div class="col-md-12"><br>
                    <div class="form-group col-sm-12">
                        <label>PHONE NUMBERS</label>
                        <input type="text" name="phone_numbers" readonly class="form-control" value="{{$bulk}}">
                    </div>
                    <div class="form-group col-sm-12">
                        <br>
                        <label>SENDER ID</label>
                        <input type="text" class="form-control" name="sender" value="CLEANODDS" required placeholder="Sender ID here">
                    </div>

                    <div class="form-group col-sm-12">
                        <br>
                        <label for="moreoption">SMS CONTENT</label>
                        <textarea name="message" id="message" required class="form-control" rows="10"></textarea>
                    </div>

                    {!! csrf_field() !!}

                    <div id="bstatus" class="col-xs-6"></div>
                    <div class="form-group col-sm-12">
                        <hr style="margin: 15px;">
                        <button class="btn btn-md btn-success" name="submit" id="smsBtn">SEND SMS</button>
                    </div>
                </div>
            </form>
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
