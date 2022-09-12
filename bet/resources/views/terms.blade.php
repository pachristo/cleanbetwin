




@section('levelJS') @endsection
@extends('layout.master')
@section('name')
  Terms And Conditions   -  Cleanodds.com
@endsection
@section('term')
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

                @include('partial.cat_head',['title'=>'Privacy Policy'])

            {{-- mobile ad --}}
                  <?php
                  $country = COUNTRYNAME;
                  $ad1 = \App\Focus\Modules\Ad\Model\Ad::where('location', 'catstore')
                  ->inRandomOrder()
                      ->where('status', '0')
                      ->first();
                      $ad2 = \App\Focus\Modules\Ad\Model\Ad::where('location', 'mcatstore')
                  ->inRandomOrder()
                      ->where('status', '0')
                      ->first();

                  ?>



                  {{-- desktop only --}}
                  <div class="row">
                      @if (isset($ad1))
                      {{-- <div class="col-12 hideSM mb-10">
                          <div class="ne-banner-layout1 mt-20-r text-center">
                              <a  href="{{ $ad1->website }}" target="_blank">
                                  <img
                                  src="{{ $path }}/ads/{{ $ad1->ads_image }}"  alt="ad"
                                      class="img-fluid">
                              </a>
                          </div>
                      </div> --}}
                      @endif
                      @if (isset($ad2))
                      {{-- mobile ad --}}
                      {{-- <div class="col-lg-4 col-md-12 hideLG mb-10">


                                  <a  href="{{ $ad2->website }}" target="_blank">
                                  <img src="{{ $path }}/ads/{{ $ad2->ads_image }}" alt="news"
                                      class="img-fluid width-100">
                                  </a>

                      </div> --}}
                      @endif

                  </div>

                <?php $testimonials = \App\Focus\Modules\Prediction\Model\Prediction::where('display', '0')->where('testimonial', '1')->where('testimonialValue', '!=', '')->orderBy('updated_at', 'DESC')->paginate(40)->onEachSide(2); ?>

                <div class="col-xl-12 col-12 ">

                    <p>A. <strong>INTRODUCTION</strong></p>
                    <p>&nbsp;1.&nbsp;By viewing or using Predictions and Betting tips on Cleanodds.com website or any of our affiliate sites, pages, accounts and/or signing up on the website, you agree to be bound by and to comply with our</p>
                    <p>&nbsp; i. these Terms and Conditions;</p>
                    <p>&nbsp; ii. our Privacy Policy;</p>
                    <p>&nbsp;iii. our Disclaimer;</p>
                    <p>&nbsp;iv. our Cookies Policy and</p>
                    <p>&nbsp;v. the Rules applicable to our betting or gaming products.</p>
                    <p>Please read the Terms carefully and if you do not accept the Terms, do not use the Website. The Terms shall apply to all Cleanodds.com sites and affiliate accounts (Cleanodds Blog: Cleanodds.com/blog, Cleanodds Forum: Cleanodds.com Facebook and twitter accounts respectively.</p>
                    <p>&nbsp;2.&nbsp;There would be the need to change Terms and our conditions from time to time for a number of reasons (including complying with applicable laws and regulations, and regulatory requirements as well as we deem fit in order to satisfy our users). As changes would be made, you are therefore advised to review the Terms on a regular basis. All major updates on the Terms and conditions and their dates of effect would be posted on the site. Should you have any issues or should any change made be unacceptable, please you are thereby advised to close your account with us and desist to play by our picks and predictions. However signing up to Cleanodds.com as well as playing by our picks indicate an agreement with our Terms and Conditions and our policies.&nbsp;</p>
                    <p>3.&nbsp;Please note that references used such as "you", "your" or the "user" refers to any person using the website or the services of Cleanodds.com and/or any of our affiliate sites as well as all signed up persons while "we" "our" and "Cleanodds.com" refers to Cleanodds.com and its management.</p>
                    <p>4.&nbsp;Please beware that right and access to Cleanodds.com as well as all our affiliates may be illegal in certain countries. You are therefore responsible for determining whether your access and use of the Website is not prohibited and is compliant with applicable laws, regulations and abiding policies in your jurisdiction.&nbsp;</p>
                    <p>5.&nbsp;Cleanodds.com is committed to providing excellent user service. By providing excellent service we ensure that we give a reasonable guarantee on our predictions and ensure that risks are reduced to their lowest minimum. As part of our commitment, Cleanodds is committed to supporting responsible gambling. We advise that all users are 18+. Although Cleanodds.com will use its reasonable endeavours to enforce its responsible gambling policies. We refuse to accept any responsibility or liability if any user uses the Cleanodds.com and its affiliate site with the intention of deliberately avoiding the relevant measures, laws, policies and regulations in place.</p>
                    <p>B.<strong> YOUR CLEANODDS ACCOUNT </strong>&bull;</p>
                    <p>1. Application</p>
                    <p>&nbsp; i. All users must be over 18+ years to sign up with Cleanodds. Cleanodds.com reserves the right to ask for proof of age from any user and suspend their account until satisfactory documentation is provided. Cleanodds takes its responsibilities in respect of under age and responsible gambling very seriously.</p>
                    <p>&nbsp; ii. Cleanodds will confirm a user&rsquo;s account by posting email verification to the user. Users only get correspondence after email verifications have been confirmed. Please note that Cleanodds does not request for users information on the verifications of accounts.&nbsp;NOTE:&nbsp;We only make requests for such information to confirm subscription payments on our Basic and Premium plan packages</p>
                    <p>&nbsp; iii. By accepting the Terms and signing up to use the Website and Predictions you hereby agree that we shall be entitled to conduct identification, credit and verification checks periodically that are required by applicable laws and regulations and relevant regulatory authorities for use of the Website and our Services generally. Also by signing up you agree to provide all such information as we require in connection with such verification checks. We shall be entitled to suspend or restrict accounts of users in any manner that we may deem in our absolute discretion to be appropriate, until the relevant checks are completed to our satisfaction.</p>
                    <p>&nbsp;iv. Users may open only one account. Information accessed by you on the Website (including results, predictions, and odds) is for your personal use only and the distribution or commercial exploitation of such information is strictly prohibited. Should we identify any user with more than one account or users reposting and sharing exclusive information explicitly, we reserve the right to treat any such accounts as one joint account or expressly delete such accounts where necessary. v. Users are advised to keep accounts up to date to ensure that continue to receive emails, notifications and also make themselves eligible to partake in promos.</p>
                    <p>2. <strong>Account Details</strong></p>
                    <p>&nbsp; i. <strong>Cleanodds</strong> allows all its users to choose their own username and password combination. Users must keep this information confidential as you are responsible for all activities on the account.&nbsp;</p>
                    <p>&nbsp; ii. Once an account has been upgraded to a plan, subscription begins( whether or not you make use of odds provided, Do not have access to your account, forgot password).</p>
                    <p>&nbsp; iii. If, at any time, you feel a third party is aware of your user name and/or password you should change it immediately via the Website. Making use of the "forgot my password" option. iv. Your Current Subscription status will always be displayed on the dashboard of users accounts.</p>
                    <p>3. <strong>Personal Details</strong></p>
                    <p>&nbsp;i. By signing up, users have entrusted us with their emails and subscription details, we are therefore obligated to protect the information of our users.</p>
                    <p>4. <strong>Deactivation of account</strong></p>
                    <p>&nbsp; i. You may stop using the Services, close your Cleanodds Account, and cancel these Terms at any time by contacting us at&nbsp;surecleanodds@gmail.comand providing sufficient information for us to verify your identity. Notwithstanding the preceding, if there are any pending transactions relating to your Cleanodds Account when we receive your deactivation notice, we will close your Cleanodds Account promptly after such transactions are completed. Your termination of these Terms will not affect any of our rights or your obligations arising under these Terms prior to deactivation.</p>
                    <p>&nbsp; ii. Upon the deactivation of your Cleanodds Account, we will place on hold the funds in your Cleanodds Wallet, if any. If you do not use the Services for a certain period, applicable law may require us to report the funds in your Cleanodds Wallet as unclaimed property. If this occurs, we may try to reach you with your contact details shown in our records. If we are unable to reach you, we may be required to deliver any funds in your Cleanodds Wallet to the applicable state as unclaimed property. The specified period to report and provide funds varies by state but usually ranges between two and five years.</p>
                    <p>&nbsp; iii. The Account can be re-activated by Admin, but through the request from the customer, by following the procedure of sending a mail to:&nbsp;surecleanodds@gmail.com and stating reasons for re-activation. Cleanodds is under no obligation to reject such a request.</p>
                    <p>&nbsp; iv. Provisions of these Terms that, by their nature, should survive termination of these Terms will survive termination of these Terms.</p>
                    <p>C. <strong>PREDICTIONS AND PICKS</strong>&nbsp;</p>
                    <p>1. <strong>Picks and Accumulations</strong></p>
                    <p>&nbsp; i. Cleanodds provide predictions at its best and guarantee our clients a reasonable guarantee on our predictions by ensuring we reduce risks to their lowest possible minimum.</p>
                    <p>&nbsp;ii. We are therefore not responsible for failing outcomes of matches as all predictions and match analysis end before the match is played and final outcomes are decided on the pitch. Information on the site should not be relied upon absolutely when placing bets and making picks. Bets are ultimately made at users own risk and discretion.</p>
                    <p>&nbsp;iii. We are also not responsible for users' individual discretional accumulations as we provide accumulations in our daily mails, Sure 2 and Sure 3 categories and take the Risk.</p>
                    <p>D. <strong>OTHERS</strong>&nbsp;</p>
                    <p>1.&nbsp;Cleanodds actively monitors traffic to and from the Website. Cleanodds reserves the right in its sole discretion to block access where evidence indicative of automated, robotic or programmed activities are found.&nbsp;</p>
                    <p>2.&nbsp;Cleanodds reserves the right to restrict access to all or certain parts of the Website at its discretion.&nbsp;</p>
                    <p>3.&nbsp;Cleanodds may alter or amend the products offered via the Website at any time and for any reason.</p>
                    <p>4.&nbsp;From time to time, all or part of the Website may be unavailable for use by you because of our maintenance of the Website and alteration or amendment of any of the Website categories. We will ensure that proper notice is given prior to the unavailability of such parts.</p>
                    <p>E. <strong>OUR LIABILITY</strong>&nbsp;</p>
                    <p>1. Cleanodds does not accept any liability for any damages, liabilities or losses which are deemed or alleged to have arisen out of or in connection with services, picks and predictions on the Website or its affiliates.&nbsp;</p>
                    <p>2.&nbsp;While Cleanodds endeavours to ensure that the information on the Website is correct, Cleanodds does not warrant the accuracy or completeness of the information and material on the Website. The Website may contain typographical errors or other inaccuracies, or information that is out of date. Cleanodds is under no obligation to update such material. The information and material on the Website is provided &ldquo;as is&rdquo;, without any conditions, warranties or other terms of any kind. Accordingly, to the maximum extent permitted by law, Cleanodds provides you with the Website on the basis that Cleanodds excludes all representations, express or implied warranties, conditions and other terms which but for these terms and conditions might have effect in relation to the Website.</p>
                    <p>F. <strong>OUR INTELLECTUAL PROPERTY RIGHTS</strong></p>
                    <p>&nbsp;1.&nbsp;The contents of the Website are protected by international copyright laws and other intellectual property rights. The owner of these rights is Cleanodds, its affiliates or other third party licensors.</p>
                    <p>2.&nbsp;Any commercial use or exploitation of the Website or its content is strictly prohibited.</p>
                    <p>G. <strong>OTHER PROVISIONS</strong>&nbsp;</p>
                    <p>1.&nbsp;These Terms and Conditions, the Privacy Policy, the Cookies Policy, the Rules and any document expressly referred to in them and any guidelines or rules posted on the Website constitute the entire agreement and understanding of the parties and supersede any previous agreement between the parties relating to their subject matter. You acknowledge and agree that in entering into and agreeing to these Terms and Conditions, the Privacy Policy, the Cookies Policy, the Rules and any document expressly referred to in them and any guidelines or rules posted on the Website you do not rely on, and shall have no remedy in respect of, any statement, representation, warranty, understanding, promise or assurance (whether negligently or innocently made) of any person (whether party to this agreement or not) other than as expressly set out therein. Nothing in this clause shall operate to limit or exclude any liability for fraud or fraudulent misrepresentation.&nbsp;</p>
                    <p>2.&nbsp;In no event will any delay, failure or omission (in whole or in part) in enforcing, exercising or pursuing any right, power, privilege, claim or remedy conferred by or arising under these Terms and Conditions or by law, be deemed to be or construed as a waiver of that or any other right, power, privilege, claim or remedy in respect of the circumstances in question, or operate so as to bar the enforcement of that, or any other right, power, privilege, claim or remedy, in any other instance at any time or times subsequently.&nbsp;</p>
                    <p>3.&nbsp;If any provision of these Terms and Conditions is found by any court or administrative body of competent jurisdiction to be invalid or unenforceable, such invalidity or unenforceability shall not affect the other provisions of these Terms and Conditions which shall remain in full force and effect.&nbsp;</p>
                    <p>4.&nbsp;Nothing in these Terms and Conditions shall create or be deemed to create a partnership, joint venture or principal-agent relationship between the parties and no party shall have authority to bind any other in any way unless expressly provided otherwise in these Terms and Conditions.&nbsp;</p>
                    <p>5.&nbsp;Cleanodds shall not be in breach of these Terms and Conditions nor liable for delay in performing, or failure to perform, any of its obligations if such delay or failure results from events, circumstances or causes beyond its reasonable control including (without limitation) any telecommunications network failures, power failures, failures in third party computer hardware or software, fire, lightning, explosion, flood, severe weather, industrial disputes or lock-outs, terrorist activity and acts of government or other competent authorities. In such circumstances the time for performance shall be extended by a period equivalent to the period during which performance of the obligation has been delayed or failed to be performed.</p>
                    <p>H.<strong> CANCELLATION/REFUND POLICY</strong>&nbsp;</p>
                    <p>1. <strong>Terms of Refund</strong>:&nbsp;Please note that you are entitled to a full refund. If your request for a refund is made IN NOT MORE THAN 24 hours after your payment was initiated and confirmed.</p>
                    <p>2. <strong>Switching Plans</strong>:&nbsp;You can choose to switch plans and get a full refund "of outstanding balance" if your request to switch plans is made not more than 48 hours after your payment was initiated and confirmed. Any outstanding balance will</p>
                </div>

                    <br><br>
                </div>

            </div>

        </section>








@endsection



