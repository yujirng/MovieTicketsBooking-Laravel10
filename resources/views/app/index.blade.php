@extends('layouts.app.main')

@section('content')
    <div class="container">
        <img src="{{ asset('template/app/images/theatre_2.jpg') }}" alt="" class="image-resize"
            style="width: 100%; height: 400px;">
    </div>

    <div class="container">
        <h2 class="part-line">Running Movies</h2>
        <div class="row">
            @foreach ($runningMovies as $movie)
                <div class="col-lg-3 col-md-3 col-sm-6 mb-3">
                    <div class="image-container position-relative">
                        <img src="uploads/{{ $movie->image }}" alt=""
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
                        <h6 class="mt-2 mb-1 col-lg-2 offset-lg-1 pl-lg-0">{{ $movie->language }}</h6>
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
                            <img class="card-img-top image-resize4 w-100" src="uploads/{{ $movie->image }}"
                                alt="Card image cap">

                            <div class="card-body">
                                <h5 class="card-title">{{ $movie->title }}</h5>
                                <p class="card-text">Director: {{ $movie->director }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            ?>

        </div>
    </div>
@endsection
