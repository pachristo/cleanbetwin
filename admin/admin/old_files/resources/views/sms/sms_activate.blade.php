@extends('layouts.master')

@section('title')
    CLEANODDS | BULK SMSing
@endsection
@section('page')
    Activate  SMS Plans
@endsection
@section('content')
    <div class="col" style="min-height: 323px;;">
        <br>

        <div class="row" style="margin-top: -20px;">
            <div class="col-sm-12">
               
               
            </div>
        
            <form method="POST" id="smsForm" action="{{url('/postActivateSms')}}" >
            

                <div class="col-md-12"><br>
                    <div class="form-group col-sm-12">
                        <label>email*</label>
                        <input type="email" name="email" class="form-control" placeholder="Enter User's Email" value="">
                    </div>
                    <div class="form-group col-sm-12">
                        <label>Select Plans*</label>
                        <select class="form-control" name="plan" placeholder="Enter User's Email" value="">
                            @foreach($plans as $key=>$value)

                            <option value='{{$value->category}}'>
                                {{Ucwords($value->category)}}   ---   {{$value->duration}}(s)</option>

                            @endforeach

                         </select>   
                    </div>
                    


                    {!! csrf_field() !!}

                    <div id="bstatus" class="col-xs-6"></div>
                    <div class="form-group col-sm-12">
                        <hr style="margin: 15px;"> 
                        <button  class="btn btn-md btn-success" id="smsBtn" name="submit" >Activate</button>
                    </div>
                </div>
            </form>

            <br><br>

            <div class="row x_title">
            <div class="col-md-12">
                <h3>Dashboard Controls: <span class="green">ADD PHONE NUMBER</span></h3>
              
            </div>

            </div>

            <h1></h1>

            <form method="POST" id="addnumber" action="{{url('/postAddNumber')}}" >
            

                <div class="col-md-12"><br>
                    <div class="form-group col-sm-12">
                        <label>email*</label>
                        <input type="email" name="email" class="form-control" placeholder="Enter User's Email" value="">
                    </div>
                    <div class="form-group col-sm-6">
                        <label>Country Code*</label>
                        @include('sms.country')
                    </div>

                    <div class="form-group col-sm-6">
                        <label>Phone Number*</label>
                        <input type="text" name="phone" class="form-control" placeholder="Phone Number">
                    </div>
                    
                    


                    {!! csrf_field() !!}

                    <div id="bstatus" class="col-xs-6"></div>
                    <div class="form-group col-sm-12">
                        <hr style="margin: 15px;"> 
                        <button  class="btn btn-md btn-success" id="addBtn" name="submit" >Add Number</button>
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
            $('#smsBtn').prop('disabled', true).html("Processing....");
            var url = $(this).attr('action');
            var dataString = $(this).serialize();
            $.ajax({
                type: "POST",
                url: url,
                data: dataString,
                dataType: "JSON",
                success: function(data){
                    if (data.status == 1) {
                        $('#smsBtn').prop('disabled', false).html("Error Encountered");
                        swal(data.encounters, '', 'warning');
                    }
                    else{
                        if (data.status==7) {
                        swal("Unknown User Email", '', 'warning');
                        $('#smsBtn').prop('disabled', false).html("Error Encountered");
                        $('#smsForm')[0].reset();
                        }
                        if(data.status==0){
                        swal("SUBSCRIPTION ACTIVATED SUCCESSFULLY", '', 'success');
                        $('#smsBtn').prop('disabled', false).html("Activating Plan");
                        $('#smsForm')[0].reset();
                        //location.reload();
                        }
                        if (data.status==7) {
                        swal("ACTIVATED SUCCESSFULLY But User Email not available online", '', 'success');
                        $('#smsBtn').prop('disabled', false).html("Activating Plan");
                        $('#smsForm')[0].reset();
                        //location.reload();
                        }
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
    <script>
        $('#addnumber').submit(function(e){
            e.preventDefault();
            $('#addBtn').prop('disabled', true).html("Processing....");
            var url = $(this).attr('action');
            var dataString = $(this).serialize();
            $.ajax({
                type: "POST",
                url: url,
                data: dataString,
                dataType: "JSON",
                success: function(data){
                    if (data.status == 1) {
                        $('#addBtn').prop('disabled', false).html("Error Encountered");
                        swal(data.encounters, '', 'warning');
                    }
                    else{
                        if (data.status==7) {
                        swal("Unknown User Email", '', 'warning');
                        $('#addBtn').prop('disabled', false).html("Error Encountered");
                        $('#addnumber')[0].reset();
                        }
                        if(data.status==0){
                        swal("NUMBER ADDED SUCCESSFULLY!", '', 'success');
                        $('#addBtn').prop('disabled', false).html("Activating Plan");
                        $('#addnumber')[0].reset();
                        //location.reload();
                        }
                       
                    }
                },
                error: function (e, status) {
                    if (e.status == 500)
                        console.log(e.Message);
                    $('#addBtn').prop('disabled', false).html("SEND SMS");
                    swal('Something is broken!','','warning');
                    // location.reload();
                }
            });
        });
    </script>
@endsection 
