<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>Privacy Policy | Cleanodds.com</title>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="Cache-Control" content="no-store" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=0">

    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <link rel="icon" href="{{asset('images/favicon.png')}}">
    <link rel="apple-touch-icon" sizes="120x120" href="images/favicon.png">
    <link rel="apple-touch-icon" sizes="152x152" href="images/favicon.png">
    <meta property="og:url" content="https://www.cleanodds.com/" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="Privacy Policy | Cleanodds.com" />
    <meta property="og:description" content="Cleanodds is the best source of well-researched football predictions, analysis, and picks from experts.." />
    <meta property="og:image" content="https://www.cleanodds.com/cleanodds/images/r2-share.png" />
    <meta property="og:image:type" content="image/png" />
    <meta property="og:image:width" content="140" />
    <meta property="og:image:height" content="140" />

@extends('layout.master')
@section('title', 'Privacy Policy')
@section('privacy', 'active')
@section('levelCSS') @endsection

@section('body')

    <section>
        <div class="container">
            <div class="row">
                <div class="col-xs-6 col-xs-offset-3">
                    <br><br>
                    <h2 class="header" style="margin-top: 60px; margin-bottom: 40px;">
                        Privacy Policy
                    </h2>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-10 col-sm-offset-1 text-justify">

                    <h3>Who we are <br><small>Our website address is: https://cleanodds.com</small></h3>
                    <br>
                    <h4>What personal data we collect and why we collect it</h4>
                    <br>
                    <h4><strong>Comments</strong></h4>
                    <p>When visitors leave comments on the site (blog page) we collect the data shown in the comments form, and also the visitor’s IP address and browser user agent string to help spam detection.</p>
                    <br>
                    <h4><strong>Media</strong></h4>
                    <p>If you upload images to the website, you should avoid uploading images with embedded location data (EXIF GPS) included. Visitors to the website can download and extract any location data from images on the website.</p>
                    <br>
                    <h4><strong>Cookies</strong></h4>
                    <p>If you leave a comment on our site (blog page) you may opt-in to saving your name, email address and website in cookies. These are for your convenience so that you do not have to fill in your details again when you leave another comment. These cookies will last for one year.</p>
                    <p>If you visit our login page, we will set a temporary cookie to determine if your browser accepts cookies. This cookie contains no personal data and is discarded when you close your browser.</p>
                    <br>
                    <h4><strong>Embedded content from other websites</strong></h4>
                    <p>Articles on this site may include embedded content (e.g. videos, images, articles, etc.). Embedded content from other websites behaves in the exact same way as if the visitor has visited the other website.</p>
                    <p>These websites may collect data about you, use cookies, embed additional third-party tracking, and monitor your interaction with that embedded content, including tracking your interaction with the embedded content if you have an account and are logged in to that website.</p>
                    <br>
                    <h4><strong>What we do with the information we gather</strong></h4>
                    <p>We require the information described above to understand your needs and provide you with a better service, and in particular for the following reasons:</p>
                    <ul>
                        <li>We may use the information to improve our products and services.</li>
                        <li>We may use the information to make sure that we are legally compliant in the information and advertisements that we display in specific countries</li>
                    </ul>
                    <br>
                    <h4><strong>How long we retain your data</strong></h4>
                    <p>If you leave a comment, the comment and its metadata are retained indefinitely. This is so we can recognize and approve any follow-up comments automatically instead of holding them in a moderation queue.</p>
                    <p>For users that register on our website (if any), we also store the personal information they provide in their user profile. All users can see, edit, or delete their personal information at any time (except they cannot change their username). Website administrators can also see and edit that information.</p>
                    <br>
                    <h4><strong>What rights you have over your data</strong></h4>
                    <p>If you have an account on this site, or have left comments, you can request to receive an exported file of the personal data we hold about you, including any data you have provided to us. You can also request that we erase any personal data we hold about you. This does not include any data we are obliged to keep for administrative, legal, or security purposes.</p>
                    <br>
                    <h4><strong>Where we send your data</strong></h4>
                    <p>Visitor comments may be checked through an automated spam detection service.</p>
                    <br>
                    <h4><strong>Google Adsense</strong></h4>
                    <p>These third-party ad servers or ad networks use technology to the advertisements and links that appear on www.cleanodds.com send directly to your browsers. They automatically receive your IP address when this occurs. Other technologies (such as cookies, JavaScript, or Web Beacons ) may also be used by the third-party ad networks to measure the effectiveness of their advertisements and / or to personalize the advertising content that you see. cleanodds.com has no access to or control over these cookies that are used by third-party advertisers.</p>
                    <p>You should consult the respective privacy policies of these third-party ad servers for more detailed information on their practices as well as for instructions about how to opt-out of certain practices. cleanodds.com’s privacy policy does not apply to, and we cannot control the activities of, such other advertisers or web sites. If you wish to disable cookies, you may do so through your individual browser options. More detailed information about cookie management with specific web browsers can be found at the browser’s respective websites.</p>

                    <br><br>

                </div>
            </div>
        </div>
    </section>

@endsection

@section('levelJS') @endsection
