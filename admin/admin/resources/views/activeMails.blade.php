@extends('layouts.master')

@section('title')
    CLEANODDS | PROMOTIONS
@endsection
@section('page')
    Email Promotion: Active Members
@endsection
@section('content')
    <div class="col" style="min-height: 323px;;">
        <br>

        <div class="row" style="margin-top: -20px;">
            <div class="col-sm-12">
                @if (session()->has('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

              
                <form action="{{ route('/loadmails') }}" id="selectMailsForm" method="post">
                    <div class="form-group col-sm-8">
                        <select class="form-control" name="mail">
                            <option value="all">All</option>
                            <option value="sure2">Sure 2</option>
                            <option value="sure5">Sure 5</option>
                            <option value="sure10">Sure 10</option>
                            <option value="investment">investment</option>
                            <option value="tvt">Today's VIP</option>
                            <option value="tvvt">Today's VVIP</option>
                            <option value="tot">Today's Ordinary</option>
                            <option value="frivt">Friday VIP</option>
                            <option value="satvt">Saturday VIP</option>
                            <option value="sunvt">Sunday VIP</option>
                        </select>
                    </div>






                    {{ csrf_field() }}
                    <div class="col-sm-4 form-group">
                        <button class="btn btn-md btn-success" name="submit" id="selectMailsBtn">SELECT
                            MAILS</button>
                    </div>
                </form>
                <a href="#" data-target="#demomail" data-toggle="modal"><button class="btn btn-md btn-danger pull-right">SEND
                        DEMO MAIL</button></a><br>
            </div>
            <form method="POST" action="{{ url('/bulkmailActive') }}" id="">
                <div class="col-md-12"><br>
                    <div class="form-group col-sm-12">
                        <label>MAIL RECIPIENTS</label>
                        <input type="text" name="emails" class="form-control" id="selectMailsInput" value="" required>
                        <input type="hidden" name="code" class="form-control" id="selectMailsInput2" value="" required>
                        {{-- <textarea class="form-control" name="emails" readonly required type="email">{{$mails}}</textarea> --}}
                    </div>
                    <div class="form-group col-sm-12">
                        <label>MAIL TITLE</label>
                        <input type="text" class="form-control" name="mailtitle" required placeholder="Title here">
                    </div>

                    <div class="form-group col-sm-12">

                        <label for="moreoption">MAIL CONTENT</label>
                        <textarea name="content" id="textarea" class="form-control textarea"></textarea>
                    </div>

                    {!! csrf_field() !!}

                    <div id="bstatus" class="col-xs-6"></div>
                    <div class="form-group col-sm-12">
                        <hr style="margin: 15px;">
                        <small><strong>NB:</strong> Kindly note that sending this BC may take quite a while. Please do not
                            refresh the page</small><br>
                        <button class="btn btn-md btn-success" name="submit" id="blogbtn">SEND MAIL</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="modal" id="demomail">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <a href="" data-dismiss="modal">
                        <div class="pull-right"><span class="fa fa-times"></span></div>
                    </a>
                    <h5>SEND SAMPLE MAIL</h5>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <?php
                            $mymail = Auth::user()->email;
                            ?>
                            <form action="#" id="demomailsender" method="post">
                                <div class="form-group col-sm-12">
                                    <input type="text" class="form-control" name="toref" required readonly
                                        value="{{ $mymail }}">
                                </div>

                                <div class="form-group col-sm-12">
                                    <input type="text" name="title" placeholder="MAIL SUBJECT" required
                                        class="form-control">
                                </div>

                                <div class="form-group col-sm-12">
                                    <label for="moreoption">MAIL CONTENT</label>
                                    <textarea name="content" id="tetarea" class="form-control textarea"></textarea>
                                </div>

                                <div id="demostatus" class="col-xs-6"></div>

                                {{ csrf_field() }}
                                <div class="col-sm-12 form-group">
                                    <button class="btn btn-md btn-success" name="submit" id="demobtn">SEND DEMO</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal-footer"></div>
            </div>
        </div>
    </div>


    <div class="modal" id="selectMailsModal">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <a href="" data-dismiss="modal">
                        <div class="pull-right"><span class="fa fa-times"></span></div>
                    </a>
                    <h5>Load Mails</h5>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12">

                        </div>
                    </div>
                </div>
                <div class="modal-footer"></div>
            </div>
        </div>
    </div>
    {{-- <script>
        tinymce.init({
            selector:'.textarea',
            setup: function (editor) {
                editor.on('change', function () {
                    editor.save();
                });
            },
            forced_root_block : "",
            force_br_newlines : true,
            force_p_newlines : false,
            statusbar: false,
            height : 80

        });</script> --}}

@endsection
@section('levelJS')


@endsection
