@extends('layouts.master')

@section('title')
    CLEANODDS | Image Testimonials
@endsection
@section('page')
    User Testimonials
@endsection
@section('content')
    <div class="col">
        <br>
        <?php
        $date = new dateTime();
        $d = $date->format('j F, Y');
        ?>
        @if (isset($success))
            <script>
                alert('{{ $success }}');
            </script>
        @endif

        <form action="{{ route('post.testimonial') }}" method="POST" id="testimonialForm" enctype="multipart/form-data">
            <div class="row">
                <div class="col-sm-10 col-md-offset-1">

                    <div class="col-md-4">
                        {{-- <label>ADs IMAGE</label> --}}
                        <div class="fileupload fileupload-new" data-provides="fileupload">
                            <div class="fileupload-new thumbnail" style="width: 250px; height: 150px;"><img
                                    src="{{ asset('images/demoUpload.jpg') }}" alt="" /></div>
                            <div class="fileupload-preview fileupload-exists thumbnail"
                                style="max-width: 160px; max-height: 150px; line-height: 20px;"></div>
                            <div>
                                <span class="btn btn-sm btn-file btn-danger"><span class="fileupload-new">SELECT TESTIMONIAL
                                        IMAGE</span><span class="fileupload-exists">Change</span>
                                    <input type="file" name="file" /></span>
                                <a href="#" class="btn btn-sm btn-danger fileupload-exists"
                                    data-dismiss="fileupload">Remove</a>
                            </div>
                        </div>
                    </div>
                    {{-- 'user_name', 'image', 'text', --}}
                    <div class="col-md-8">
                        <div class="form-group col-sm-8">
                            <label>USER NAME </label>
                            <input type="text" name="user_name" class="form-control" required>
                        </div>
                        <div class="form-group col-sm-4">

                            <label>*SELECT COUNTRIES</label>
                            <select name="country" class="form-control crs-country select2" data-region-id="one" required
                                id=""></select>
                        </div>


                        <div class="form-group col-lg-12">
                            <label>TEXT</label>
                            <textarea style="width:100%;height:120px" class="form-control" name="text"></textarea>
                        </div>



                        {!! csrf_field() !!}
                        <div class="form-group col-sm-12">
                            <button class="btn btn-md btn-success" name="submit" id="testimonialBtn">SUBMIT</button>
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
                    <th>USER NAME</th>

                    <th>THUMBNAIL</th>
                    <th>TEXT</th>
                    <th>COUNTRY</th>


                    <th>Controls</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tes as $ad)
                    <tr id="d{{ $ad->id }}">
                        <td class="red">{{ $ad->id }}</td>
                        <td>{{ $ad->user_name }}</td>

                        <td style="text-align:center;">

                            <a href="{{ asset('images/testimonial') }}/{{ $ad->image }}" target="_blank">
                                <center><img src="{{ asset('images/testimonial') }}/{{ $ad->image }}"
                                        style="max-height: 50px;" class="img-responsive" alt=""></center>
                            </a>

                        </td>
                        <td>

                            <a>

                                <?php
                                     $yourString='';
                                    if (strlen($ad->text) > 120) {
                                        // if you want...
                                        $maxLength = 120;
                                        $yourString = substr($ad->text, 0, $maxLength).'........';
                                    }
                                ?>
                                {{$yourString}}

                            </a>






                        </td>
                        <td>{{ $ad->country }}</td>

                        <td>
                            <div class="btn-group">
                                <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                    Actions
                                    <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu pull-right" role="menu"
                                    style="background: whitesmoke; -webkit-box-shadow: inset 0px 0px 10px grey;-moz-box-shadow: inset 0px 0px 10px grey;box-shadow: inset 0px 0px 10px grey;">


                                    <li style="cursor: pointer;"><a class="testimonialDelete"
                                            href="{{ route('testimonialDelete') }}" data-id="{{ $ad->id }}">DELETE</a>
                                    </li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                @endforeach
                {!! $tes->render() !!}
            </tbody>
        </table>
    </div>
@endsection
