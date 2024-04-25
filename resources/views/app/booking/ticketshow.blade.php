<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Booking Summary">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Summary</title>
    <link href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css' rel='stylesheet'>


    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&display=swap"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/fontawesome.min.css">
</head>

<body>
    <div class="container py-5">
        <div class="row mb-4">
            <div class="col-lg-8 mx-auto text-center">
                <h1 class="display-6 text-capitalize">YOUR TICKET</h1>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6 mx-auto">

                <div class="card">
                    <div class="card-header">
                        <center><img src="{{ asset('template/app/images/logo.png') }}" width="40%">
                            <h6> Nha Trang, Khanh Hoa</h6>
                        </center>

                        <table>
                            <tr>
                                <td>+84 123-456-7890</td>
                                <td style="padding: 12px 2px 12px 155px;">Booking
                                    Id: {{ $bookingInfo->id }}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td style="padding: 1px 2px 1px 155px;">Date: {{ $bookingInfo->booking_date }}</td>
                            </tr>
                        </table>
                        <hr>

                        <center>
                            <h3>Movie Name</h3>
                            <h3>{{ $bookingInfo->showtime->movie->title }}</h3><br>
                        </center>

                        <table>
                            <tr>
                                <th colspan="2">Name</th>
                            </tr>
                            <tr>
                                <td colspan="2" style="padding: 12px 0px;">{{ $bookingInfo->user->name }}</td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <th style="padding: 1px 105px;">Phone</th>
                            </tr>
                            <tr>
                                <td>{{ $bookingInfo->user->email }}</td>
                                <td style="padding: 12px 105px;">{{ $bookingInfo->user->phone }}</td>
                            </tr>
                            <tr>
                                <th>Payment Date</th>
                                <th style="padding: 1px 105px;">Payment Amount</th>
                            </tr>
                            <tr>
                                <td>{{ $bookingInfo->booking_date }}</td>
                                <td style="padding: 12px 105px;">RS. {{ $bookingInfo->total_price }}/-</td>
                            </tr>
                        </table>

                        <hr>

                        <h4>BOOKING DETAILS:</h4>
                        <table>
                            <tr>
                                <th>Theater</th>
                                <th style="padding: 0px 2px 0px 60px">Date</th>
                                <th style="padding-left: 30px;">Time</th>
                            </tr>
                            <tr>
                                <td>{{ $bookingInfo->showtime->theater->theater_name }}</td>
                                <td style="padding: 12px 2px 12px 60px">{{ $bookingInfo->booking_date }}</td>
                                <td style="padding-left: 30px;"> {{ $bookingInfo->showtime->showtime }}</td>
                            </tr>
                            <tr>
                                <th colspan="2">Seats</th>
                                <th style="padding: 0px 2px 0px 60px;">Total Seats</th>
                            </tr>
                            <tr>
                                <td colspan="2" style="padding-right: 150px;">{{ $bookingInfo->seats }}</td>
                                <td style="padding: 12px 2px 12px 60px">{{ $bookingInfo->total_seats }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="row d-flex justify-content-center mt-3">
            <a href="{{ route('app.index') }}" class="btn btn-primary">Back to main page</a>
        </div>
    </div>
</body>

</html>
