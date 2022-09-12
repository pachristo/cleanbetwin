@extends('layouts.master')

@section('title')
    CLEANODDS | ALL PREDICTIONS
@endsection
@section('page')
   Announcememt
   
@endsection
@section('content')
    <div class="col" style="min-height: 323px;;">

        <div class="text-center">
            <button class="btn btn-primary" data-toggle="modal" data-target="#announcement" style="float: right;"><i class="fa fa-plus"></i>  Add Announcememt </button>
        </div>
        <br>
        <br>
        <br><br>
        <?php
        $date = new dateTime();
        $d = $date->format('j F, Y');
        ?>
       
    </div>
<div class="row" id="excon">

</div>
<div class="modal" id="announcement">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4><span class="fa fa-bullhorn"></span>Announcememt</h4>
            </div>
            <div class="modal-body">
                {{-- <center> --}}
                <ul class="nav nav-pills">
                    
                    <li class="active">
                        <a data-toggle="pill" href="#picture">Picture Announcememt</a>
                    </li>
                     <li class="">
                        <a data-toggle="pill" href="#text">Text Announcememt</a>
                    </li>

                </ul>
                <div class="tab-content">
                    <div id="picture" class="tab-pane fade in active">
                         <form method="POST" action="{{url('/picture/announcement')}}" id="picture_announcement" enctype="multipart/form-data">

            <div class="row" style="margin-top: 10px;">
               

                    <div class="col-sm-12">
                        <div class="input-field col-md-12">
                            <label>Announcememt Image *</label>
                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;"><img src="{{asset('images/demoUpload.jpg')}}" alt="" /></div>
                                <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 160px; max-height: 150px; line-height: 20px;"></div>
                                <div>
                            <span class="btn btn-sm btn-file btn-default"><span class="fileupload-new">SELECT IMAGE</span><span class="fileupload-exists">Change</span>
                            <input type="file" name="file" required/></span>
                                    <a href="#" class="btn btn-sm btn-danger fileupload-exists" data-dismiss="fileupload">Remove</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    {!! csrf_field() !!}

               <div class="form-group col-sm-12">
                        <button class="btn btn-md btn-success" name="submit" id="pictureBtn">SUBMIT POST</button>
                    </div>
               
            </div>
        </form>

                    </div>
                    <div id="text" class="tab-pane ">
                        
                        <form action="{{url('/text/announcement')}}" id="text_announcement" method="post">
                             <div class="col-sm-12">
                    <div class="form-group col-sm-12">
                        <label for="moreoption">BLOG CONTEXT *</label>
                        <textarea name="content" id="textarea" class="form-control"></textarea>
                    </div>
                    
                     {!! csrf_field() !!}
                    <div class="form-group col-sm-12">
                        <button class="btn btn-md btn-success" name="submit" id="textBtn">SUBMIT POST</button>
                    </div>
                </div>
                            

                        </form>
                    </div>

                </div>

            {{-- </center> --}}
              
            </div>
            <div class="modal-footer"></div>
        </div>
    </div>
</div>

@endsection
@section('levelJS')
<script type="text/javascript">
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$(document).ready(function () {

    

    $('#picture_announcement').submit(function(e){
        e.preventDefault();
        $('#pictureBtn').prop('disabled', true).html("UPLOADING <i class=' fa fa-spin fa-spinner'></i>");
        var url = $(this).attr('action');
        var dataString = new FormData($(this)[0]);

        $.ajax({
            type: "POST",
            url: url,
            data: dataString,
            processData: false,
            contentType: false,
            async: true,
            dataType: "JSON",
            success: function(data){
                if (data.status == 1) {
                    $('#pictureBtn').prop('disabled', false).html("Submit");
                    swal(data.encounters, '', 'warning');
                }
                else{
                    $('#picture_announcement')[0].reset();
                    swal("Picture Announcememt SUCCESSFULLY published", '', 'success');
                    $('#pictureBtn').prop('disabled', false).html("submit");
                    setTimeout(location.reload(), 5000);
                }
            },
            error: function (e, status) {
                if (e.status == 500)
                    $('#pictureBtn').prop('disabled', false).html("Try Again");
                    swal('Something is broken!','','warning');
                    location.reload();
            }
        });
    });
    $('#text_announcement').submit(function(e){
        e.preventDefault();
        $('#textBtn').prop('disabled', true).html("Processing Data <i class=' fa fa-spin fa-spinner'></i>");
        var url = $(this).attr('action');
        var dataString = new FormData($(this)[0]);

        $.ajax({
            type: "POST",
            url: url,
            data: dataString,
            processData: false,
            contentType: false,
            async: true,
            dataType: "JSON",
            success: function(data){
                if (data.status == 1) {
                    $('#textBtn').prop('disabled', false).html("Submit");
                    swal(data.encounters, '', 'warning');
                }
                else{
                    $('#text_announcement')[0].reset();
                    swal("Text  Announcememt SUCCESSFULLY published", '', 'success');
                    $('#textBtn').prop('disabled', false).html("submit");
                     setTimeout(location.reload(), 5000);

                }
            },
            error: function (e, status) {
                if (e.status == 500)
                    $('#textBtn').prop('disabled', false).html("Try Again");
                    swal('Something is broken!','','warning');
                    location.reload();
            }
        });
    });


      $('.delete_announcement').on('click',function(e){
        e.preventDefault();
        var id = $(this).attr('href');
        var url = $(this).attr('data-url');
        //var msg = $(this).attr('data-msg');
        swal({
            title:'Do you want to delete?',
            //text:'Click Ok to continue',
            type:'warning',
            showCancelButton:true,
            closeOnConfirm:false,
            showLoaderOnConfirm:true,
            confirmButtonColor:'#DD6B55',
            confirmButtonText:'Yes, delete it!'
        },function(){
            $.ajax({
                type: "GET",
                url: url+'/'+id,
                success: function (data) {
                    $('#record'+id).hide();
                    swal('Item Deleted!','','success');
                },
                failure: function (data) {
                    alert("SOMETHING ISN'T RIGHT");
                    location.reload();
                }
            });
        });
    });
});
</script>
@endsection