@section('levelJS') @endsection
@extends('layout.master')
@section('name')
    About Us - Cleanodds.com
@endsection
@section('about')
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

            @include('partial.cat_head',['title'=>'About Us'])


            <div class="col-lg-12 ">
                <p><strong>WHAT IS OUR GOAL? WHAT DO YOU GET?</strong></p>
                <p>We</p>
                <p>i. Carefully analyse football matches</p>
                <p>ii. Thoroughly examine upcoming sporting events</p>
                <p>iii. Analyze all aspects to make sure the result we predict will be as accurate as possible</p>
                <p>iv. Avoid predicting uncertain football matches</p>
                <p>v. Provide analytical report for our premium users</p>
                <p>vi. Provide expert picks for our users to make selections</p>
                <p>You</p>
                <p>i. Receive a complete analysis of upcoming football matches</p>
                <p>ii. Form your ideas and opinions based on our guuidance</p>
                <p>iii. Make your bets on single or multiple games</p>
                <p>iv. Increase the success rate of your bets with any bookmaker</p>
                <p>v. Aren&rsquo;t spending a lot of time making match forecasts on your own</p>
                <p>vi. WIN!</p>
                <p><strong>HOW WE OPERATE </strong></p>
                <p>Each Cleanodds advice contains:&nbsp;</p>
                <p>i. Detailed description of reasons why each pick was made</p>
                <p>ii. Risk management strategy which determines possible outcomes of single and multiple events iii. Recommendations on how to distribute your money among selected picks.</p>
                <p>We offer the most likely outcome of each football match. You will clearly see reasons why selected teams or football matches ought to win and minimize your risks. Our team offers you complete details concerning upcoming football matches. You are not compelled to take all our selections. It is your choice whether to place a bet on recommended result. We help you make decisions, which provide real monetary value for you.</p>
                <p><strong>WE PREDICT TOP LEAGUES</strong>&nbsp;</p>
                <p>Cleanodds team offer predictions mainly on top leagues and tournaments. If we made careless decisions, imagine the effect it would have on the bankroll of our esteemed users. Investing on unclear tournaments is too careless for your bankroll. It is almost impossible to offer quality predictions on events, if there is no open source information about them. Top-leagues are under constant close attention of media and sport governing organizations, unlike non-popular championships, where there is a high chance of bribery. In this case, how can you trust such analysis? Cleanodds will increase the success rate of your bets!</p>

            </div>

        </div>

    </section>








@endsection
