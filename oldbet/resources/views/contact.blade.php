@section('levelJS') @endsection
@extends('layout.master')
@section('name')
   contact Us - Cleanodds.com
@endsection
@section('contact')
active
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

            @include('partial.cat_head',['title'=>'Contact Us'])


            <div class="col-lg-12 ">
                <p><strong>For general enquiries, please reach us </strong></p>
                <p><span style="color: #ff9900;"><a style="color: #ff9900;" href="mailto:surecleanodds@gmail.com ">surecleanodds@gmail.com</a></span></p>
                <p><strong>For Advert &amp; sponsorship please reach us</strong></p>
                <p><span style="color: #ff9900;">Advert@cleanodds.com</span></p>

                <p><strong>Chat us on WhatsApp ONLY:</strong></p>
                <p><span style="color: #008000;"> +256780430994 </span></p>
            <br><br>



            </div>

        </div>

    </section>








@endsection
