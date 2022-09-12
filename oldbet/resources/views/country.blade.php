
@extends('layout.master')
@section('title')
Select Your Country - Cleanodds.com

@endsection
@section('vip', 'active')
@section('CSS')
<style>
select.form-control:not([size]):not([multiple]) {
    height: 44px;
    font-size: 1.3rem;
    border: 1px solid green;
}
</style>
@endsection


@section('body')
   <!-- News Slider Area Start Here -->
   <?php

   $country = COUNTRYNAME;
   $announcements = \App\Announcement::all();

   ?>


        <section class="bg-body">
            <div class="container">
                <ul class="news-info-list text-center--md">

                    <li>
                        <i class="fa fa-calendar" aria-hidden="true"></i><span id="current_date"></span>
                    </li>

                </ul>
            </div>
        </section>



        <section class="bg-accent section-space-default">
            <div class="container">

                @include('partial.cat_head',['title'=>'Select Country'])

                   

                <div class="col-lg-12 nopaddingsmall">
                    <section>
                        <div class="container" style="background: #fff; padding: 40px 15px; margin-bottom: 20px; margin-top: 20px;">
                            <div class="row">
                                <div class="col-sm-4 offset-sm-4 text-justify section-head">
                                    <br>
                                    <h2 style="color: black;" class="well">Set Your Country</h2>
                                    <div class="clear"></div>
                                    <p>Kindly select your country below to customize your payment options. (You will only do this once).</p>
                                    <hr>
                                    <form action="{{route('/country')}}" id="countryForm" method="post">
                                        <div class="form-group">
                                            <select name="country" class="form-control crs-country" data-region-id="one" data-default-value="{{currentUser()->country}}" required id=""></select>
                                        </div>
                                        {{ csrf_field() }}
                                        <div class="form-group">
                                            <button class="btn btn-md btn-success btn-block" id="countryBtn">PROCEED <i class="fa fa-arrow-circle-o-right"></i></button>
                                        </div>
                                    </form>
                                    <br><br>
                                </div>
                            </div>
                        </div>
                    </section>
                  
                </div>

            </div>

        </section>








@endsection
@section('JS')
    <script>
        $(document).ready(function () {
            $('#countryForm').submit(function (e) {
                e.preventDefault();
                $('#countryBtn').prop('disabled', true).html("SETTING COUNTRY <i class='fa fa-spinner fa-spin'></i>");
                var url =  $(this).attr('action');
                var method = $(this).attr('method');
                var formData = $(this).serialize();

                $.ajax({
                    type: method,
                    url: url,
                    data: formData,
                    dataType: "JSON",
                    success: function (data) {
                        if (data.status == 1) {
                            $('#countryBtn').prop('disabled', false).html("PROCEED <i class='fa fa-arrow-circle-right'></i>");
                            swal(data.post, '', 'warning');
                        }
                        else {
                            window.location.href="{{$url}}";
                        }
                    },
                    failure: function (e) {
                        swal('OOPS! SOMETHING IS BROKEN', 'Reloading Page', 'danger');
                        location.reload();
                    }
                })
            });
        });
    </script>
@endsection