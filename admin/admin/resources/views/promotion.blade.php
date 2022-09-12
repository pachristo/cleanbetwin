@extends('layouts.master')

@section('title')
    CLEANODDS | Promotion 
@endsection
@section('page')
    PROMOTION IMAGE
@endsection
@section('content')
    <div class="col">
        <br>
        <?php
        $date = new dateTime();
        $d = $date->format('j F, Y');
        ?>
      <style>
          /*
*
* ==========================================
* CUSTOM UTIL CLASSES
* ==========================================
*
*/
#upload {
    opacity: 0;
}

#upload-label {
    position: absolute;
    top: 50%;
    left: 1rem;
    transform: translateY(-50%);
}

.image-area {
    border: 2px dashed rgba(255, 255, 255, 0.7);
    padding: 1rem;
    position: relative;
}

.image-area::before {
    content: 'Uploaded image result';
    color: #fff;
    font-weight: bold;
    text-transform: uppercase;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    font-size: 0.8rem;
    z-index: 1;
}

.image-area img {
    z-index: 2;
    position: relative;
}

.prom_popup{
    width: 900px;
    margin: auto;
    text-align: center
}
.prom_popup img{
    /* width: 200px; */
    /* height: 200px; */
    cursor: pointer
}
.prom_show{
    z-index: 999;
    display: none;
}
.prom_show .overlay{
    width: 100%;
    height: 100%;
    background: rgba(0,0,0,.66);
    position: absolute;
    top: 0;
    left: 0;
}
.prom_show .prom-img-show{
    width: 600px;
    height: 400px;
    background: #FFF;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%,-50%);
    overflow: hidden
}
.img-show span{
    position: absolute;
    top: 10px;
    right: 10px;
    z-index: 99;
    cursor: pointer;
}
.img-show img{
    width: 100%;
    height: 100%;
    position: absolute;
    top: 0;
    left: 0;
}
/*End style*/



      </style>

        <form action="{{ route('post.promotion') }}" class="col-lg-8  col-lg-offset-2 text-center" method="POST" id="promForm" enctype="multipart/form-data" style="border: 2px dashed;">
            <div class="row">
                <div class="col-sm-10 col-md-offset-1">

                    <div class="col-md-12 text-center">
                   


                        <div class="container py-5">

                          
                        
                        
                            <div class=" py-4">
                                <div class="col-lg-12 mx-auto">
                         {{-- <p class="font-italic text-white text-center">The image uploaded will be rendered inside the box below.</p> --}}
                                    <div class="image-area mt-4"><img id="imageResult" src="#" alt="" style="    max-width: 500px;" class="img-fluid rounded shadow-sm mx-auto d-block"></div>
                        
                                    <!-- Upload image input-->
                                    <div class="input-group mb-3 px-2 py-2 rounded-pill bg-white shadow-sm">
                                        <input id="upload" type="file" name="file" onchange="readURL(this);" class="form-control border-0">
                                        {{-- <label id="upload-label" for="upload" class="font-weight-light text-muted">Choose file</label> --}}
                                        <div class="input-group-append text-center">
                                            <label for="upload" class="btn btn-light m-0 rounded-pill px-4"> <i class="fa fa-cloud-upload mr-2 text-muted" style="    font-size: 65px;"></i><small class="text-uppercase font-weight-bold text-muted">CLICK TO CHOOSE FILE</small></label>
                                        </div>
                                    </div>
                        
                                    <!-- Uploaded image area-->
                                   
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <div class="col-md-12">
                    <div class="form-group col-sm-12 text-left">
                        <label class="text-danger">*(PROMOTION LINK)</label>
                        <input class="form-control " name="link" placeholder="PLEASE ENTER YOUR LINK HERE!">
                    </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group col-sm-12">
                            <button class="btn btn-md btn-success" name="submit" id="promBtn" style="    width: 49%;">UPLOAD AD</button>
                        </div>



                        {!! csrf_field() !!}
                     

                    </div>
                </div>

            </div>
        </form>
        <hr>

        <table id="datatable" class="table table-striped table-bordered nowrap" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>REL</th>
                   
                    <th>THUMBNAIL</th>
                    <th>LINK URL</th>
                
                    {{-- <th>DISPLAY</th> --}}

                    <th>Controls</th>
                </tr>
            </thead>
            <tbody>
                @foreach($ads as $key=>$val)
                <tr class="d{{ $val->id }}">
                    <td>{{ $val->id }}</td>
                    <td>   <a href="{{asset('images/promotion')}}/{{$val->image}}" target="_blank">
                        <center ><div class="prom_popup" >
                            <img src="{{asset('images/promotion')}}/{{$val->image}}" style="max-height: 50px;" class="img-responsive" alt="">
                        
                        </div></center>
                    </a></td>
                    <td>{{ $val->link }}</td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                Actions
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu pull-right" role="menu" style="background: whitesmoke; -webkit-box-shadow: inset 0px 0px 10px grey;-moz-box-shadow: inset 0px 0px 10px grey;box-shadow: inset 0px 0px 10px grey;">
                                {{--<li style="cursor: pointer;"><a class="updateads" href="{{$val->id}}" data-target="#updateads" data-toggle="modal">EDIT/UPDATE</a>--}}


                                
                                    <li style="cursor: pointer;"><a class="update_status" href="{{ route('promotion.update.status') }}/{{$val->id}}/1"  data-id="{{$val->id}}"  data-status="1" id="h{{$val->id}}" msg="You are about to Hide this Promotion?" @if($val->status=="1")style="display:none;"@endif>HIDE THIS</a>
                                {{-- @else --}}
                                    <li style="cursor: pointer;"><a class="update_status" href="{{ route('promotion.update.status') }}/{{$val->id}}/0" data-id="{{$val->id}}" data-status="0" id="unh{{$val->id}}"  msg="You are about to Unhide this Promotion?" @if($val->status=="0")style="display:none;"@endif><span style="color: green;">SHOW THIS</span></a>
                                {{-- @endif --}}

                                <li style="cursor: pointer;"><a class="update_status" href="{{ route('promotion.update.status') }}/{{$val->id}}/2" data-id="{{$val->id}}"  data-status="2" msg="You are about to Delete this Promotion?">DELETE</a>
                                </li>
                            </ul>
                        </div>
                    </td>
                </tr>



                @endforeach
              
            </tbody>
        </table>
    </div>

      <div class="prom_show">
        <div class="overlay"></div>
        <div class="prom-img-show">
          <span>X</span>
          <img src="">
        </div>
      </div>
@endsection

@section('levelJS')
<script>
    
/*  ==========================================
    SHOW UPLOADED IMAGE
* ========================================== */
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#imageResult')
                .attr('src', e.target.result);
        };
        reader.readAsDataURL(input.files[0]);
    }
}

$(function () {
    $('#upload').on('change', function () {
        readURL(input);
    });
});

/*  ==========================================
    SHOW UPLOADED IMAGE NAME
* ========================================== */
var input = document.getElementById( 'upload' );
var infoArea = document.getElementById( 'upload-label' );

input.addEventListener( 'change', showFileName );
function showFileName( event ) {
  var input = event.srcElement;
  var fileName = input.files[0].name;
//   infoArea.textContent = 'File name: ' + fileName;
}

    
    $(".prom_popup img").click(function (e) {
        e.preventDefault();
        var $src = $(this).attr("src");
        $(".prom_show").fadeIn();
        $(".prom-img-show img").attr("src", $src);
    });
    
    $("span, .overlay").click(function () {
        $(".prom_show").fadeOut();
    });
    $('.update_status').click(function(e){
        msg=$(this).attr('msg');
        url=$(this).attr('href');
        id= $(this).attr('data-id');
        status=$(this).attr('data-status');
       
        e.preventDefault();
        swal({
            title: msg,
            //text:'Click Ok to continue',
            type: 'warning',
            showCancelButton: true,
            closeOnConfirm: false,
            showLoaderOnConfirm: true,
            confirmButtonColor: '#DD6B55',
            confirmButtonText: 'Yes!'
        }, function () {
            $.ajax({
                type: "GET",
                url: url,
                dataType:'JSON',
                success: function (data) {
                    // $('#'+ id).hide();
                    swal(data.encounters, '', 'success');
                    if(status=='0'){
                        $('#h'+id).show();
                        $('#unh'+id).hide();

                    }else if(status=='1'){
                        $('#h'+id).hide();
                        $('#unh'+id).show();
                    }else{
                        
                        $('.d'+id).hide();
                    }
                   
                },
                failure: function (data) {
                    alert("SOMETHING ISN'T RIGHT");
                    location.reload();
                }
            });
        });
    });
    

$('#promForm').submit(function (e) {
        e.preventDefault();
        $('#promBtn').prop('disabled', true).html("UPLOADING ...");
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
            success: function (data) {
                console.log(data);
                if (data.status == 1) {
                    $('#promBtn').prop('disabled', false).html("UPLOAD PROMOTION");
                    swal(data.encounters, '', 'warning');
                }
                else {
                    $('#promForm')[0].reset();
                    swal("PROMOTION UPLOADED SUCCESSFULLY", '', 'success');
                    $('#promBtn').prop('disabled', false).html("UPLOAD PROMOTION");
                    location.reload();
                }
            },
            error: function (e, status) {
                if (e.status == 500)
                    $('#promBtn').prop('disabled', false).html("UPLOAD PROMOTION");
                swal('Something is broken!', '', 'warning');
                location.reload();
            }
        });
    });

    </script>    

    
@endsection
