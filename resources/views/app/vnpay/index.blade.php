<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Tạo mới đơn hàng</title>
    <!-- Bootstrap core CSS -->
    <link href="{{ asset('template/vnpay/bootstrap.min.css') }}" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="{{ asset('template/vnpay/jumbotron-narrow.css') }}" rel="stylesheet">
    <script src="{{ asset('template/vnpay/jquery-1.11.3.min.js') }}"></script>
</head>

<body>
    <div class="container">
        <div class="header clearfix">
            <h3 class="text-muted">VNPAY</h3>
        </div>
        <h3>Tạo mới đơn hàng</h3>
        <div>
            <table class="table-responsive">
                <form action="{{ route('payment.vnpay') }}" id="create_form" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="language">
                            Loại hàng hóa
                        </label>
                        <select name="order_type" id="order_type">
                            <option value="billpayment">Thanh toán hóa đơn</option>
                            <option value="topup">Nạp tiền điện thoại</option>
                            <option value="fashion">Nạp tiền điện thoại</option>
                            <option value="other">Khác - Xem thêm tại VNPay</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="amount">Số tiền</label>
                        <input class="form-control" id="amount" name="amount" type="number"
                            value="{{ $totalMoney }}" readonly>
                    </div>
                    {{-- <div class="form-group">
                        <label for="order_desc">Nội dung thanh toán</label>
                        <textarea class="form-control" cols="20" id="order_desc" name="order_desc" rows="2"
                            placeholder="Nội dung thanh toán"></textarea>
                    </div> --}}
                    <div class="form-group">
                        <label for="bank_code">Ngân hàng</label>
                        <select name="bank_code" id="bank_code" class="form-control">
                            <option value="NCB">Ngân hàng NCB</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="language">Ngôn ngữ</label>
                        <select name="language" id="language" class="form-control">
                            <option value="vn">Tiếng Việt</option>
                            <option value="en">English</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary" id="btnPopup" style="margin-right: 16px;">Xác nhận
                        thanh toán</button>
                    <button type="button" onclick="history.back()" class="btn btn-primary" id="btnPopup">Quay trở
                        lại</button>
                </form>
            </table>
        </div>



        {{-- <div class="form-group">
            <button onclick="pay()">Giao dịch thanh toán</button><br>
        </div>
        <div class="form-group">
            <button onclick="querydr()">API truy vấn kết quả thanh toán</button><br>
        </div>
        <div class="form-group">
            <button onclick="refund()">API hoàn tiền giao dịch</button><br>
        </div> --}}
        <p>
            &nbsp;
        </p>
        <footer class="footer">
            <p>&copy; VNPAY <?php echo date('Y'); ?></p>
        </footer>
    </div>
    {{-- <script>
        function pay() {
            window.location.href = "/vnpay_php/vnpay_pay.php";
        }

        function querydr() {
            window.location.href = "/vnpay_php/vnpay_querydr.php";
        }

        function refund() {
            window.location.href = "/vnpay_php/vnpay_refund.php";
        }
    </script> --}}
</body>

</html>
