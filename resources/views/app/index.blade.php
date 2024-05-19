@extends('layouts.app.main')

@section('style')
    <link rel="stylesheet" href="{{ asset('template/app/css/slick.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('template/app/css/slick-theme.css') }}" type="text/css">

    <style>
        .slide-container {
            width: 1400px;
            margin: 0 50px;
        }
    </style>
@endsection

@section('content')
    {{-- <div class="container-fluid my-4">
        <img src="{{ asset('template/app/images/theatre_2.jpg') }}" alt="" class="image-resize"
            style="width: 100%; height: 400px;">
    </div> --}}

    <div class="container-fluid my-4">
        <div class="main-carousel">
            <a href="{{ route('movie.details', 14) }}">
                <div class="p-1 slide-container">
                    <img src="{{ Storage::url('slider_images/1.jpg') }}" alt="">
                </div>
            </a>
            <a href="{{ route('movie.details', 13) }}">
                <div class="p-1 slide-container">
                    <img src="{{ Storage::url('slider_images/2.jpg') }}" alt="">
                </div>
            </a>
            <a href="{{ route('movie.details', 19) }}">
                <div class="p-1 slide-container">
                    <img src="{{ Storage::url('slider_images/3.jpg') }}" alt="">
                </div>
            </a>
            <a href="{{ route('movie.details', 13) }}">
                <div class="p-1 slide-container">
                    <img src="{{ Storage::url('slider_images/4.jpg') }}" alt="">
                </div>
            </a>
            <a href="{{ route('movie.details', 19) }}">
                <div class="p-1 slide-container">
                    <img src="{{ Storage::url('slider_images/5.jpg') }}" alt="">
                </div>
            </a>
        </div>
    </div>

    <div class="container">
        <h2 class="part-line my-5">Running Movies</h2>
        <div class="row">
            @foreach ($runningMovies as $movie)
                <div class="col-lg-3 col-md-3 col-sm-6 mb-3">
                    <div class="image-container position-relative">
                        <img src="{{ Storage::url('movie_images/' . $movie->image) }}" alt=""
                            class="w-100 img-fluid image-resize2 object-fit-cover">
                        <div class="overlay">
                            <div class="overlay-buttons">
                                <div class="col">
                                    <div class="row">
                                        <a href="{{ route('movie.details', $movie->id) }}"
                                            class="btn btn-primary mx-auto overlay-button">
                                            <i class="fa fa-ticket"></i> Book Now
                                        </a>
                                    </div>
                                    <div class="row mt-3">
                                        <a class="btn btn-dark text-center mx-auto overlay-button" data-toggle="modal"
                                            data-target="#trailer_modal{{ $movie->id }}">
                                            <i class="fa fa-play"></i> Trailer
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <h5 class="mt-2 mb-1 col-lg-8"><b>{{ $movie->title }}</b></h5>
                        @if ($movie->cens != 'P')
                            <h4 class="mt-2 mb-1 col-lg-2 offset-lg-1 pl-lg-0">
                                <span class="badge bg-warning">{{ $movie->cens }}</span>
                            </h4>
                        @endif
                    </div>
                </div>

                <div class="modal fade" id="trailer_modal{{ $movie->id }}" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog vh-100 vw-100 d-flex align-items-center justify-content-center"
                        role="document">
                        <div class="modal-content mx-auto" style="height: 80%; width: 100%;">
                            <iframe src="{{ $movie->trailer_link }}" frameborder="0" class="modal-iframe w-100 h-100"
                                allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share; fullscreen"></iframe>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="container">
        <h2 class="part-line">Upcoming Movies</h2>
        <div class="row">
            @foreach ($upcomingMovies as $movie)
                <div class="image-box">
                    <div class="col-lg-2 col-md-3 col-sm-6">
                        <div class="card" style="width: 12rem;">
                            <img class="card-img-top image-resize4 w-100"
                                src="{{ Storage::url('movie_images/' . $movie->image) }}" alt="Card image cap">

                            <div class="card-body">
                                <h5 class="card-title">{{ $movie->title }}</h5>
                                <p class="card-text">Director: {{ $movie->director->name }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('template/app/js/slick.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('.main-carousel').slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                dots: true,
                centerMode: true,
                focusOnSelect: true,
                autoplay: true,
                autoplaySpeed: 2000,
                variableWidth: true,
            });
        });
    </script>
@endsection
