@extends('account.layouts.master')

@section('title') Make Payment @endsection
@section('vip') active @endsection
@section('levelCSS') @endsection

@section('body')
    <div class="panel theme-panel">
        {{--<div class="row">--}}
            <div class="col-sm-12">
                <div class="well" style="">
                    <table class="table table-striped table-bordered">
                        <tr>
                            <th>Category</th>
                            <th>Plan</th>
                            <th>Price</th>
                            <th>Duration</th>
                        </tr>
                        <tr>
                            <td>{{$sub->category}} Tips</td>
                            <td>{{$sub->planName}}</td>
                            <td>N{{number_format($sub->nairaPrice)}} / ${{number_format($sub->dollarPrice)}} / KSH{{number_format($sub->keshPrice)}}</td>
                            <td>{{$sub->accessTime}}</td>
                        </tr>
                    </table>
                </div>
            </div>
        {{--</div>--}}
        <div class="panel-heading">
            <span class="panel-title">
                SELECT PAYMENT METHOD
            </span>
        </div>
        <div class="panel-body">
            {{--<div class="row">--}}
                <div class="col-sm-12 clearfix">
                    <div class="col-sm-4">
                        <div class="panel panel-primary">
                            <div class="panel-heading">Online Payment</div>
                            <div class="panel-body"><img src="{{asset('images/vmaster.png')}}" class="img-responsive" alt="Visa, Mastercard & Verve"></div>
                            <div class="panel-footer">
                                <p>Make Payment SECURELY online with your Mastercard, Visa or Verve ATM Card and get activated automatically. Click below to Proceed!</p>
                                    <input type='image' onclick="pay3()" src='https://voguepay.com/images/buttons/make_payment_blue.png' alt='Make Payment' />
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="panel panel-primary">
                            <div class="panel-heading">Skrill Payment</div>
                            <div class="panel-body"><img src="{{asset('images/skrill.gif')}}" class="img-responsive" alt="Skrill Payment"></div>
                            <div class="panel-footer">
                                Send your payment to: <strong class="text-danger">betloaded@gmail.com</strong> <br>
                                After successful transaction, send us a mail containing, <strong>Your Email Address</strong> and <strong>Transaction ID</strong> to <strong class="text-danger">info@betloaded.com</strong>

                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="panel panel-primary">
                            <div class="panel-heading">Neteller Payment</div>
                            <div class="panel-body"><img src="{{asset('images/neteller.png')}}" class="img-responsive" alt="Neteller"></div>
                            <div class="panel-footer">
                                Send your payment to: <strong class="text-danger">betloaded@gmail.com</strong> <br>
                                After successful payment, send the following details to us: <strong>(1) Name of Depositor (2) Date (3) Amount</strong> to <strong>info@betloaded.com</strong>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 clearfix">
                    <div class="col-sm-4">
                        <div class="panel panel-primary">
                            <div class="panel-heading">Bank/Mobile Transfer</div>
                            <div class="panel-body"><img src="{{asset('images/bank_trasfer.png')}}" class="img-responsive" alt="Bank Transfer"></div>
                            <div class="panel-footer">
                                <table class="table table-bordered">
                                    <tr>
                                        <th>Acct Name</th>
                                        <td>Ibitoye Sesan</td>
                                    </tr>
                                    <tr>
                                        <th>Acct No</th>
                                        <td>2060126885</td>
                                    </tr>
                                    <tr>
                                        <th>Bank</th>
                                        <td>United Bank of Africa (UBA)</td>
                                    </tr>
                                </table>
                                After Successful transaction, Kindly Forward us a mail containing <strong>(1) Your Email (2) Amount Paid (4) Teller Number or Screenshopt</strong> to <strong class="text-danger">info@betloaded.com</strong>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="panel panel-primary">
                            <div class="panel-heading">Western Union</div>
                            <div class="panel-body"><img src="{{asset('images/western-union.jpg')}}" class="img-responsive" alt="Western Union"></div>
                            <div class="panel-footer">
                                Contact us via Email: <strong class="text-danger">info@betloaded.com</strong> for Account Details

                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="panel panel-primary">
                            <div class="panel-heading">Bitcoin</div>
                            <div class="panel-body"><img src="{{asset('images/bitcoin.png')}}" class="img-responsive" alt="Bitcoin"></div>
                            <div class="panel-footer">
                                Our Bitcoin Address: <strong>1Bxb2L5bX1MYuHWkx6MFreLtWTzQnEH6fw</strong> <br>
                                <p>After successful transaction, send us a mail containing, <strong>(1) Payment Screenshot (2) Your Email Address The (3) Date of Payment (4) Transaction Hash Code (5) Subscription Plan</strong> to <strong class="text-danger">info@betloaded.com</strong></p>

                            </div>
                        </div>
                    </div>
                </div>
            {{--</div>--}}

        </div>
    </div>
@endsection

@section('levelJS')
    <script src="//voguepay.com/js/voguepay.js"></script>
    <script>

        closedFunction=function() {
            alert('YOU JUST CANCELLED THE TRANSACTION');
        };

        successFunction=function(transaction_id) {
            window.location.href='{{route('/processPayment')}}/'+transaction_id+'/{{$sub->id}}';
//            alert('Transaction was successful, Ref: '+transaction_id)
        };

        failedFunction=function(transaction_id) {
            alert('Transaction was not successful, Ref: '+transaction_id)
        }

    </script>
    <script>
        function pay3() {
            Voguepay.init({
                v_merchant_id: '6297-0054309',
                total: '{{$sub->nairaPrice}}',
//                notify_url: 'http://domain.com/notification.php',
                cur: 'NGN',
                merchant_ref: '{{$sub->id}}',
                memo: 'Payment for sportspesatips {{$sub->category}} Tips of {{$sub->accessTime}} Plan',
//                recurrent: true,
//                frequency: 10,
                developer_code: '5b05dd94cf9cd',
                store_id: '{{$sub->id}}',
                loadText:'HOLD ON, PLEASE...',
                items: [
                    {
                        name: "{{$sub->category}} Tips",
                        description: "{{$sub->accessTime}} Duration",
                        price: "{{$sub->nairaPrice}}"
                    }
                ],
                closed:closedFunction,
                success:successFunction,
                failed:failedFunction
            });
        }
    </script>
@endsection