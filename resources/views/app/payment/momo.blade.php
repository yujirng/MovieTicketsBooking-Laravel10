<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>MoMo Sandbox</title>
    <script type="text/javascript" src="{{ asset('template/momo/jquery/dist/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('template/momo/moment/min/moment.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('template/momo/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript"
        src="{{ asset('template/momo/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js') }}">
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.4.1/css/bootstrap.min.css" />
    <link rel="stylesheet"
        href="{{ asset('template/momo/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css') }}" />
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h1 class="panel-title">Payment status/Kết quả thanh toán MOMO</h1>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12">
                                {!! $result !!}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 col-sm-12">
                                <div class="form-group">
                                    <label for="fxRate" class="col-form-label">PartnerCode</label>
                                    <div class='input-group date' id='fxRate'>
                                        <input type='text' name="partnerCode" value="{{ $partnerCode }}"
                                            class="form-control" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <div class="form-group">
                                    <label for="fxRate" class="col-form-label">AccessKey</label>
                                    <div class='input-group date' id='fxRate'>
                                        <input type='text' name="accessKey" value="{{ $accessKey }}"
                                            class="form-control" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <div class="form-group">
                                    <label for="fxRate" class="col-form-label">OrderId</label>
                                    <div class='input-group date' id='fxRate'>
                                        {{-- <input type='text' name="orderId" value="{{ $paymentDataorderId }}"
                                            class="form-control" /> --}}
                                        <input type='text' name="orderId" value="{{ $paymentData['orderId'] }}"
                                            class="form-control" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 col-sm-12">
                                <div class="form-group">
                                    <label for="fxRate" class="col-form-label">transId</label>
                                    <div class='input-group date' id='fxRate'>
                                        <input type='text' name="transId" value="{{ $paymentData['transId'] }}"
                                            class="form-control" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <div class="form-group">
                                    <label for="fxRate" class="col-form-label">OrderInfo</label>
                                    <div class='input-group date' id='fxRate'>
                                        <input type='text' name="orderInfo" value="{{ $paymentData['orderInfo'] }}"
                                            class="form-control" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <div class="form-group">
                                    <label for="fxRate" class="col-form-label">orderType</label>
                                    <div class='input-group date' id='fxRate'>
                                        <input type='text' name="orderType" value="{{ $paymentData['orderType'] }}"
                                            class="form-control" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 col-sm-12">
                                <div class="form-group">
                                    <label for="fxRate" class="col-form-label">Amount</label>
                                    <div class='input-group date' id='fxRate'>
                                        <input type='text' name="amount" value="{{ $paymentData['amount'] }}"
                                            class="form-control" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <div class="form-group">
                                    <label for="fxRate" class="col-form-label">Message</label>
                                    <div class='input-group date' id='fxRate'>
                                        <input type='text' name="message" value="{{ $paymentData['message'] }}"
                                            class="form-control" />
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="col-md-4 col-sm-12">
                                <div class="form-group">
                                    <label for="fxRate" class="col-form-label">localMessage</label>
                                    <div class='input-group date' id='fxRate'>
                                        <input type='text' name="localMessage"
                                            value="{{ $paymentData['localMessage'] }}" class="form-control" />
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                        <div class="row">
                            <div class="col-md-4 col-sm-12">
                                <div class="form-group">
                                    <label for="fxRate" class="col-form-label">payType</label>
                                    <div class='input-group date' id='fxRate'>
                                        <input type='text' name="payType" value="{{ $paymentData['payType'] }}"
                                            class="form-control" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <div class="form-group">
                                    <label for="fxRate" class="col-form-label">ExtraData</label>
                                    <div class='input-group date' id='fxRate'>
                                        <input type='text' type="text" name="extraData"
                                            value="{{ $paymentData['extraData'] }}" class="form-control" />
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="col-md-4 col-sm-12">
                                <div class="form-group">
                                    <label for="fxRate" class="col-form-label">signature</label>
                                    <div class='input-group date' id='fxRate'>
                                        <input type='text' name="signature"
                                            value="{{ $paymentData['m2signature'] }}" class="form-control" />
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    {{-- <a href="/" class="btn btn-primary">Back to continue payment...</a> --}}
                                    <form action="{{ route('showticket', ['bookingId' => $bookingId]) }}"
                                        method="POST">
                                        @csrf
                                        <button class="btn btn-info text-white" type="submmit"">Show Ticket</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</body>

</html>
