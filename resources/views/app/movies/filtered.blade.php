<div class="container">
    <div class="row">
        @if (isset($movies) && count($movies) > 0)
            @foreach ($movies as $movie)
                <div class="col-lg-4 col-md-5 col-sm-6 mb-3 bg-white p-1 d-flex flex-column">
                    <div class="image-container">
                        <img src="{{ Storage::url('movie_images/' . $movie->image) }}" alt=""
                            class="object-fit-cover w-100 img-fluid image-resize2">
                        <div class="overlay">
                            <div class="overlay-buttons">
                                <div class="col">
                                    <div class="row">
                                        @if ($movie->running === 0)
                                            <a href="{{ route('movie.details', $movie->id) }}"
                                                class="btn btn-primary mx-auto overlay-button">
                                                <i class="fa fa-spinner"></i>
                                                Upcomming
                                            </a>
                                        @endif
                                        @if ($movie->running === 1)
                                            <a href="{{ route('movie.details', $movie->id) }}"
                                                class="btn btn-primary mx-auto overlay-button">
                                                <i class="fa fa-ticket"></i>
                                                Book Now
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="p-2 bg-dark text-white rounded text-info-container">
                        Title: {{ $movie->title }} @if ($movie->cens != 'P')
                            <span class="badge badge-warning">{{ $movie->cens }}</span>
                        @endif
                        <br />
                        Director: {{ $movie->director->name }}<br />
                        Genres: {{ implode(', ', $movie->genres->pluck('genre_name')->toArray()) }}
                        <br />
                    </div>
                </div>
            @endforeach
        @else
            <h3>No Data Found</h3>
        @endif
    </div>
</div>
