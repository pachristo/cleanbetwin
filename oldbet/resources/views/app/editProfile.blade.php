@extends('app.layouts.master')

@section('title') Update Profile @endsection
@section('home') active @endsection
@section('levelCSS') @endsection

@section('body')

   <!--start content-->

    @if (session()->has('success'))
        <div class="col-sm-12">
            <div class="alert alert-success text-center">
                <h5>{{ session()->get('success') }}</h5>
            </div>
        </div>
    @endif
    @if (session()->has('error'))
        <div class="alert alert-warning text-center">
            <h5>{!! session()->get('error') !!}</h5>
        </div>
    @endif
    <div class="row">

    </div>
    <div class="col-12 col-lg-8 offset-lg-2 mt-2">
        <div class="card shadow-sm border-0 overflow-hidden">
            <div class="card-body">

                 {{--<div class="row">--}}
        <form action="{{route('/app/updateProfile')}}" id="updateProfile" method="post" class="row" enctype="multipart/form-data">
            <div class="col-sm-4">
                <div class="panel theme-panel panel-danger">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="panel-heading">
                                <h3 class="panel-title">
                                    Profile Picture
                                </h3>
                            </div>
                            <div class="panel-body">
                                <div class="row clearfix">
                                    <div class="col-sm-12 column">
                                        <div class="widget bg-white p-a20">
                                            <div class="search-bx text-center">
                                                <div class="fileupload fileupload-new" data-provides="fileupload">
                                                    <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                                                        <img class="img-responsive" src="
                                                @if(currentUser()->passport)
                                                        {{$localPath}}/users/{{currentUser()->passport}}
                                                        @else
                                                        {{$localPath}}/avatar.png
                                                @endif
                                                                " alt="update tested odds profile">
                                                    </div>
                                                    <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                                    <div>
                                                                        <span class="btn btn-file btn-success btn-sm"><span class="fileupload-new">Choose Photo</span><span class="fileupload-exists">Change</span>
                                                                            <input type="file" name="file" /></span>
                                                        <a href="#" class="btn btn-danger fileupload-exists  btn-sm" data-dismiss="fileupload">Remove</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-8 ">
                    <div class="row">
                        <div class="col-sm-12">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                        <h3 class="panel-title">
                            Account Details
                        </h3>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                               
                                        <div class="form-group col-sm-8">
                                            <label for="">Full Name *</label>
                                            <input type="text" class="form-control" required placeholder="full name here" name="full_name" value="{{currentUser()->full_name}}">
                                        </div>
                                        <div class="form-group col-sm-4">
                                            {{ csrf_field() }}
                                            <label for="">Username</label>
                                            <input type="text" class="form-control" placeholder="username here" name="username" value="{{currentUser()->username}}">
                                        </div>
                                      
                                        <div class="form-group col-sm-6">
                                            <label for="">Email Address *</label>
                                            <input type="email" class="form-control" required placeholder="email address here" name="email" value="{{currentUser()->email}}">
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label for="">Phone Number *</label>
                                            <input type="text" class="form-control" required placeholder="phone number here" name="phone" value="{{currentUser()->phone}}">
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label for="">Country *</label>
                                            <input type="text" class="form-control" required placeholder="country here" name="country" value="{{currentUser()->country}}">
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label for="">State/City/Province</label>
                                            <input type="text" class="form-control" placeholder="state/city here" name="state" value="{{currentUser()->state}}">
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label for="">New Password</label>
                                            <input type="password" class="form-control" placeholder="leave blank if not changing" name="password">
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label for="">Confirm Password</label>
                                            <input type="password" class="form-control" placeholder="leave blank if not changing" name="password_confirmation">
                                        </div>
                                        <div class="form-group col-sm-12 mt-2">
                                            <button class="btn btn-md btn-primary" id="updateBtn">Save Updates</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </form>
            </div>




        </div>

    </div>

    </div>
    {{-- <div class="alert alert-success text-center"><h5>error some where </h5></div> --}}




    </div>




<!--end page main-->


        <form>




        </form>
    {{--</div>--}}
@endsection

@section('levelJS') @endsection
