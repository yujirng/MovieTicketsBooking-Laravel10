<!DOCTYPE html>
<html>

<head>
    <title>Movie Ticket Booking</title>

    @include('layouts.app.head')
    <link rel="stylesheet" href="{{ asset('template/app/css/index.css') }}">
    @yield('style')

</head>

<body>

    @include('layouts.app.header')

    @yield('content')

    @include('layouts.app.footer')

    @yield('scripts')
</body>
