@extends('layouts.master')

@section('title')
    CLEANODDS | Sms Plans
@endsection
@section('page')
    SMS PLANS
@endsection
@section('content')
    <div class="col" style="min-height: 323px;;">
        <br>
        <a href="#" data-target="#addsmsplans" data-toggle="modal"><button class="btn btn-md btn-success">ADD PLANS</button></a>

        <hr>

          @if( session()->has('message'))
                    <div class="alert alert-success">
                        {{session('message')}}
                    </div>
                @endif

              
          @if( session()->has('danger'))
                    <div class="alert alert-alert">
                        {{session('danger')}}
                    </div>
                @endif
        <div class="row">
            <div class="col-xs-12" id="">
                <table class="table table-striped" id="datatable">
                    <thead>
                    <tr>
                        
                        <th>NAME</th>
                        <th>naira Price</th>
                        <th>ced Price</th>
                        <th>kesh Price</th>
                        <th>tzs Price</th>
                        <th>dollar Price</th>
                        <th></th>
                        
                        
                    </tr>
                    </thead>
                    <tbody>
                     @foreach($plans as $key => $pt)
                        <tr id="record{{$pt->id}}">

                            <td>{{$pt->planName}}</td>
                            <td>{{number_format($pt->nairaPrice)}}</td>
                            <td>{{number_format($pt->cedPrice)}}</td>
                            <td>{{number_format($pt->keshPrice)}}</td>
                            <td>{{number_format($pt->ugxPrice)}}</td>
                            <td>{{number_format($pt->dollarPrice)}}</td>
                            <td><a href="{{route('/deletePlans')}}" class="deleteItem" data-id="{{$pt->id}}" data-msg="DELETE THIS PLAN"><i class=" fa fa-trash-o fa-1x text-danger"></i></a></td>
                            <td><a href="#" class="" data-target="#edit{{$pt->id}}" data-toggle="modal"><i class=" fa fa-pencil  text-success"></i></a></td>
                        </tr>
    <div class="modal " id="edit{{$pt->id}}" >
    <div class="modal-dialog modal-sm">
        <div class="modal-content col-sm-12"  style="width: 500px;">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4><span class="fa fa-adn"></span> Edit Plan</h4>
            </div>
            <div class="modal-body">
                <form action="{{route('/updateSmsPlan')}}" method="post" id="updateplan">
                    <input type="hidden" name="id" value="{{$pt->id}}">
                    <div class="form-group col-sm-12">

                        <label for="">Plan Name*</label>
                        <input type="text" name="planName" required class="form-control" value="{{$pt->planName}}">
                    </div>
                    <div class="form-group col-sm-6">
                        <?php
                        $due=$pt->duration;
                        $due=explode(' ', $pt->duration);

                        ?>

                        <label for="due2">Duration*</label>
                         <select name="due2" style="border: whitesmoke;">
                        <option value="{{$due[1]}}" default> {{$due[1]}}</option>>
                        <option value="day">day</option>
                        <option value="week">week</option>
                        <option value="month">Month</option>
                        <option value="year">year</option>
                        </select>
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="due1">Numbers*</label>
                        <select name="due1" style="border: whitesmoke;">
                        <option value="{{$due[0]}}" default >{{$due[0]}}</option>
                        @for($i=1;$i<32;$i++)
                        <option value="{{$i}}">{{$i}}</option>
                        @endfor
                        </select>
                        
                       

                    </div>

                    <div class="form-group col-sm-6">
                        <label for="nairaPrice">Nigerian Price</label>
                        <input type="text" name="nairaPrice" class="form-control" value="{{$pt->nairaPrice}}">
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="keshPrice">kenyan Price</label>
                        <input type="text" name="keshPrice" class="form-control" value="{{$pt->keshPrice}}">
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="ugxPrice">Ugandan Price</label>
                        <input type="text" name="ugxPrice" class="form-control" value="{{$pt->ugxPrice}}">
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="cedPrice">Ghanaian Price</label>
                        <input type="text" name="cedPrice" class="form-control " value="{{$pt->cedPrice}}">
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="">Tanzanian Price</label>
                        <input type="text" name="tzsPrice" class="form-control" value="{{$pt->tzsPrice}}">
                    </div>
                     <div class="form-group col-sm-6">
                        <label for="">other Price</label>
                        <input type="text" name="dollarPrice" class="form-control" value="{{$pt->dollarPrice}}">
                    </div>
                    <div class="form-group col-sm-12">
                        <label for="">benefits</label>
                        <input type="text" name="planBenefits" class="form-control" value="{{$pt->planBenefits}}">
                    </div>
                    {{ csrf_field() }}
                    <div class="form-group col-sm-4">
                        <button type="submit" class="btn btn-md btn-success" id="updatebtn"><i class="fa fa-arrow-circle-o-right"></i> Update plan</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer"></div>
        </div>
    </div>
</div>

                    @endforeach 
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- modals --}}
<div class="modal " id="addsmsplans" >
    <div class="modal-dialog modal-sm">
        <div class="modal-content col-sm-12"  style="width: 500px;">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4><span class="fa fa-adn"></span> New Plan</h4>
            </div>
            <div class="modal-body">
                <form action="{{route('/AddSmsPlan')}}" method="post" id="addplan">
                    <div class="form-group col-sm-12">
                        <label for="">Plan Name*</label>
                        <input type="text" name="planName" required class="form-control">
                    </div>
                    <div class="form-group col-sm-6">

                        <label for="due2">Duration*</label>
                         <select name="due2" style="border: whitesmoke;">
                        <option value="day">day</option>
                        <option value="week">week</option>
                        <option value="month">Month</option>
                        <option value="year">year</option>
                        </select>
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="due1">Numbers*</label>
                        <select name="due1" style="border: whitesmoke;">
                        @for($i=1;$i<32;$i++)
                        <option value="{{$i}}">{{$i}}</option>
                        @endfor
                        </select>
                        
                       

                    </div>
                    <div class="form-group col-sm-6">
                        <label for="nairaPrice">Nigerian Price</label>
                        <input type="text" name="nairaPrice" class="form-control">
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="keshPrice">kenyan Price</label>
                        <input type="text" name="keshPrice" class="form-control">
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="ugxPrice">Ugandan Price</label>
                        <input type="text" name="ugxPrice" class="form-control">
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="cedPrice">Ghanaian Price</label>
                        <input type="text" name="cedPrice" class="form-control">
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="">Tanzanian Price</label>
                        <input type="text" name="tzsPrice" class="form-control">
                    </div>
                     <div class="form-group col-sm-6">
                        <label for="">other Price</label>
                        <input type="text" name="dollarPrice" class="form-control">
                    </div>
                    <div class="form-group col-sm-12">
                        <label for="">benefits</label>
                        <input type="text" name="planBenefits" class="form-control">
                    </div>
                    {{ csrf_field() }}
                    <div class="form-group col-sm-4">
                        <button class="btn btn-md btn-success" id="sponsorBtn"><i class="fa fa-arrow-circle-o-right"></i> ADD plan</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer"></div>
        </div>
    </div>
</div>



    {{-- endmodals --}}
@endsection

@section('levelJS')
    <script>
        $('#addplan').submit(function(e){
            e.preventDefault();
            $('#sponsorBtn').prop('disabled', true).html("ADDING PLAN....");
            var url = $(this).attr('action');
            var dataString = $(this).serialize();
            $.ajax({
                type: "POST",
                url: url,
                data: dataString,
                dataType: "JSON", 
                success: function(data){
                    if (data.status == 1) {
                        $('#sponsorBtn').prop('disabled', false).html("ADD PLAN");
                        swal(data.encounters, '', 'warning');
                    }
                    else{
                        $('#addSponsor')[0].reset();
                        swal("PLAN ADDED SUCCESSFULLY", '', 'success');
                        $('#sponsorBtn').prop('disabled', false).html("ADD PLAN");
                        location.reload();
                    }
                },
                error: function (e, status) {
                    if (e.status == 500)
                        console.log(e.Message);
                    $('#sponsorBtn').prop('disabled', false).html("ADD PLAN");
                    swal('Something is broken!','','warning');
                    // location.reload();
                }
            });
        });
    </script>
     
@endsection