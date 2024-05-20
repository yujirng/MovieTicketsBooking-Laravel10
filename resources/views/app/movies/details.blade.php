@extends('layouts.app.main')

@section('style')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        .container h2 {
            text-transform: uppercase;
            letter-spacing: 1px;
            color: #222;
            font-size: 30px;
        }

        .part-line {
            border-bottom: solid 2px red;
            margin-bottom: 25px;
            margin-top: 25px;
        }

        .image-container {
            position: relative;
        }

        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            opacity: 0;
            transition: opacity 0.3s ease;
            background-color: rgba(0, 0, 0, 0.5);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .overlay-buttons {
            text-align: center;
            display: none;
        }

        .image-container:hover .overlay {
            opacity: 1;
        }

        .image-container:hover .overlay-buttons {
            display: block;
        }

        .overlay-buttons a {
            color: #fff;
            padding: 10px 20px;
            margin-right: 10px;
            text-decoration: none;
            border: 1px solid #fff;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .overlay-buttons a:hover {
            background-color: #fff;
            color: #000;
        }

        .image-container h6 {
            text-align: right;
        }

        .overlay-button {
            width: 150px;
        }

        .modal-dialog {
            max-width: 1500px;
            margin-top: -1rem;
        }

        @media (min-width: 992px) {
            .movie-detail-image {
                position: absolute;
                top: -50px;
                left: -30px;
                border: 5px solid white;
            }

            .showing-movie {
                height: 200px;
                object-fit: cover;
            }
        }

        @media (min-width: 576px) and (max-width: 992px) {

            .showing-movie {
                object-fit: contain;
            }

        }

        .movie-detail-block {
            height: 475px;
        }
    </style>
@endsection

@section('content')
    <div class="fluid-container">
        <!-- Trailer Embed -->
        <div class="row mt-4" style="background-color: black;">
            <div class="d-flex justify-content-center w-100">
                <img src="{{ Storage::url('movie_images/' . $movie->image) }}" class="img-fluid"
                    style="height: 500px; width: 600px;" alt="Movie Image">
                <button type="button"
                    class="btn bg-white btn-play position-absolute rounded-circle d-flex align-items-center justify-content-center"
                    style="top: 50%; left: 50%; transform: translate(-50%, -50%); font-size: 24px; width: 64px; height: 64px;"
                    data-toggle="modal" data-target="#trailer_modal{{ $movie->id }}">
                    <i class="fa fa-play"></i>
                </button>
            </div>
        </div>

        <div class="modal fade" id="trailer_modal{{ $movie->id }}" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog vh-100 vw-100 d-flex align-items-center justify-content-center" role="document">
                <div class="modal-content mx-auto" style="height: 80%; width: 100%;">
                    <iframe src="{{ $movie->trailer_link }}" frameborder="0" class="modal-iframe w-100 h-100"
                        allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share; fullscreen"></iframe>
                </div>
            </div>
        </div>

    </div>
    <div class="col-lg-10 offset-lg-1">
        <div class="row feature design">
            <div class="col-lg-8">
                <div class="row movie-detail-block">
                    <div class="offset-lg-1 col-lg-4"><img src="{{ Storage::url('movie_images/' . $movie->image) }}"
                            class="rounded shadow-lg movie-detail-image resize-detail object-fit-cover" alt=""
                            width="100%"></div>
                    <div class="col-lg-7 mb-lg-5">
                        <div>
                            <h2 class="mt-3">{{ $movie->title }}
                                @if ($movie->cens != 'P')
                                    <span class="badge badge-warning">{{ $movie->cens }}</span>
                                @endif
                            </h2>
                            <div class="my-3">
                                <ion-icon class="text-warning" name="calendar-outline"></ion-icon>
                                {{ $movie->release_date }}
                            </div>
                            <div class="mb-2">
                                <h4><span class="text-dark mr-3">Genres:</span>
                                    @foreach ($movie->genres as $genre)
                                        <a class="btn btn-outline-warning text-dark font-weight"
                                            href="#">{{ $genre->genre_name }}</a>
                                    @endforeach
                                </h4>
                            </div>
                            <div class="mb-2">
                                <h4><span class="text-dark mr-3">Director:</span>
                                    <a class="btn btn-outline-warning text-dark font-weight"
                                        href="#">{{ $movie->director->name }}</a>
                                </h4>
                            </div>
                            <div class="mb-2">
                                <h4><span class="text-dark mr-3">Actors:</span>
                                    @foreach ($movie->actors as $actor)
                                        <a class="btn btn-outline-warning text-dark font-weight"
                                            href="#">{{ $actor->name }}</a>
                                    @endforeach
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row px-sm-4 px-lg-0 mb-sm-5 mb-lg-0">
                    <div class="description mt-5">
                        <h4 class="pl-3 text-dark mb-3 border-bottom border-danger border-3 pb-2 font-weight-bold">
                            Description</h4>
                        <p>
                            <!--                                            Jeff Lang (Tobey Maguire), an OBGYN, and his wife Nealy (Elizabeth Banks), who owns a small-->
                            <!--                                            shop, live in Seattle with their two-year-old son named Miles. Considering a second child, they-->
                            <!--                                            decide to enlarge their small home and lay expensive new grass in their backyard. Worms in the-->
                            <!--                                            grass attract raccoons, who destroy the grass, and Jeff goes to great lengths to get rid of the-->
                            <!--                                            raccoons, mixing poison with a can of tuna. Their neighbor Lila (Laura Linney) tells Jeff that-->
                            <!--                                            her cat Matthew is missing, and Jeff does not yet realize he may be responsible.-->
                            {{ $movie->description }}
                        </p>
                    </div>
                </div>
                @if (!$theaters->isEmpty())
                    <div class="row mb-5">
                        @if ($movie->status == 1)
                            <div class="col-md-12">
                                <div class="row px-sm-4 px-lg-0">
                                    <div class="col-md-12 pb-2 mb-4 text-black border-bottom border-danger border-3">
                                        <h4 class="font-weight-bold">Showtimes</h4>
                                    </div>
                                </div>
                                <div class="row justify-content-center mb-4">
                                    <div class="col-md-12">
                                        <nav class="navbar navbar-expand-lg navbar-light bg-light">
                                            <div class="collapse navbar-collapse" id="navbarNav">
                                                <ul class="navbar-nav">
                                                    @foreach ($dates as $date)
                                                        <li class="nav-item mr-3">
                                                            <button class="nav-link date-btn font-weight-bold rounded"
                                                                data-date="{{ $date['date'] }}">
                                                                {{ $date['formatted_date'] }}
                                                            </button>
                                                        </li>
                                                    @endforeach
                                                </ul>

                                                <div class="ml-auto d-flex">
                                                    <select id="theaterSelect" class="form-control selected-fix">
                                                        <option data-display="Select a Theater">Select a Theater</option>

                                                        @foreach ($theaters as $theaterId => $theaterName)
                                                            <option value="{{ $theaterId }}">
                                                                {{ $theaterName }}
                                                            </option>
                                                        @endforeach

                                                    </select>
                                                </div>
                                            </div>
                                        </nav>
                                        <div class="col-md-12 mt-3" id="showtimes-section">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                @endif
            </div>
            <div class="col-lg-4 p-lg-3">
                <div class="h4 pb-2 mb-4 text-black border-bottom border-danger">
                    Phim đang chiếu
                </div>
                <div class="row">
                    <div class="offset-lg-1 col-lg-10 justify-content-center flex-column">
                        @if ($currentMovies)
                            @foreach ($currentMovies as $currentMovie)
                                <div class="card shadow-lg mb-3 p-3 border-0">
                                    <div class="col-md-12">
                                        <div class="image-container">
                                            <img src="{{ Storage::url('movie_images/' . $currentMovie->image) }}"
                                                alt="" class="w-100 img-fluid image-resize2 showing-movie">
                                            <div class="overlay">
                                                <div class="overlay-buttons">
                                                    <div class="col">
                                                        <div class="row">
                                                            <a href="{{ route('movie.details', $currentMovie->id) }}"
                                                                class="btn btn-primary mx-auto overlay-button">
                                                                <i class="fa fa-ticket"></i>
                                                                Book Now
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <h5 class="mt-2 mb-1"><b>{{ $currentMovie->title }}</b></h5>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            "No currently running movies."
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>
@endsection

@section('scripts')
    <script>
        let movieId = {{ $movie->id }};
    </script>
    <script>
        $(document).ready(function() {
            var todayDate = new Date().toISOString().split('T')[0];
            loadShowtimes(todayDate);

            $('.date-btn').click(function() {
                var selectedDate = $(this).data('date');
                loadShowtimes(selectedDate);
            });

            function loadShowtimes(date) {
                $.ajax({
                    url: '{{ route('showtimes.fetch') }}',
                    method: 'GET',
                    data: {
                        date: date,
                        movieId: movieId
                    },
                    success: function(response) {
                        $('#showtimes-section').html(response);
                    },
                    error: function(xhr, status, error) {
                        alert('Error fetching showtimes');
                        console.log(xhr.responseText);
                    }
                });
            }

            var todayDate = new Date().toISOString().split('T')[0];
            loadShowtimes(todayDate);

            $('.date-btn[data-date="' + todayDate + '"]').addClass('active');

            $('.date-btn').click(function() {
                var selectedDate = $(this).data('date');

                $('.date-btn').removeClass('active');

                $(this).addClass('active');

                loadShowtimes(selectedDate);
            });

            // Xử lý select box

            $('#theaterSelect').change(function() {
                let selectedTheater = $(this).val();
                let selectedDate = $('.date-btn.active').data('date');

                if (typeof selectedDate === 'undefined') {
                    selectedDate = todayDate;
                }

                //console.log(selectedTheater + ' ' + selectedDate + ' ' + movieId);
                fetchShowtimes(selectedDate, selectedTheater, movieId);
            });

            // $('#theaterSelect').change(function () {
            //     let selectedTheater = $(this).val();
            //     let navbarDate = $('.date-btn.active');
            //     let selectedDate = navbarDate.data('date');
            //
            //     if (typeof selectedDate === 'undefined') {
            //         $('.date-btn:first').addClass('active');
            //         let navbarDate = $('.date-btn.active');
            //         selectedDate = navbarDate.data('date');
            //     }
            //
            //     console.log(selectedTheater + ' ' + selectedDate + ' ' + movieId);
            //     fetchShowtimes(selectedDate, selectedTheater, movieId);
            // });


            function fetchShowtimes(selectedDate, selectedTheater, movieId) {
                $.ajax({
                    url: '{{ route('showtimes.fetch') }}',
                    method: 'GET',
                    data: {
                        date: selectedDate,
                        theaterId: selectedTheater,
                        movieId: movieId
                    },
                    success: function(response) {
                        console.log(response);
                        $('#showtimes-section').html(response);
                    },
                    error: function() {
                        alert('Error fetching showtimes');
                    }
                });
            }
        });
    </script>
@endsection
