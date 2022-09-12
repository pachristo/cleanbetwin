@extends('layouts.master')

@section('title')
    CLEANODDS | PARTNERS
@endsection
@section('page')
    Partners
@endsection
@section('content')
    <div class="col" style="min-height: 323px;;">
        <br>
        <a href="#" data-target="#partnerModal" data-toggle="modal"><button class="btn btn-md btn-success">ADD PARTNER</button></a>

        <hr>
        <div class="row">
            <div class="col-xs-12" id="">
                <table class="table table-striped" id="datatable">
                    <thead>
                    <tr>
                        <th>S/N</th>
                        <th>NAME</th>
                        <th>DESCRIPTION</th>
                        <th>URL</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($pts as $key => $pt)
                        <tr id="record{{$pt->id}}">
                            <td>{{$key+1}}</td>
                            <td>{{$pt->name}}</td>
                            <td>{{$pt->description}}</td>
                            <td>{{$pt->url}}</td>
                            <td><a href="{{route('/deleteSponsor')}}" class="deleteItem" data-id="{{$pt->id}}" data-msg="DELETE THIS PARTNER"><i class=" fa fa-trash-o fa-1x text-danger"></i></a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('levelJS')
    <script>
        $('#addSponsor').submit(function(e){
            e.preventDefault();
            $('#sponsorBtn').prop('disabled', true).html("ADDING PARTNER");
            var url = $(this).attr('action');
            var dataString = $(this).serialize();
            $.ajax({
                type: "POST",
                url: url,
                data: dataString,
                dataType: "JSON",
                success: function(data){
                    if (data.status == 1) {
                        $('#sponsorBtn').prop('disabled', false).html("ADD PARTNER");
                        swal(data.encounters, '', 'warning');
                    }
                    else{
                        $('#addSponsor')[0].reset();
                        swal("SPONSOR ADDED SUCCESSFULLY", '', 'success');
                        $('#sponsorBtn').prop('disabled', false).html("ADD PARTNER");
                        location.reload();
                    }
                },
                error: function (e, status) {
                    if (e.status == 500)
                        console.log(e.Message);
                    $('#sponsorBtn').prop('disabled', false).html("ADD PARTNER");
                    swal('Something is broken!','','warning');
                    // location.reload();
                }
            });
        });
    </script>
@endsection