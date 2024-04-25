@foreach ($showtimes as $showtime)
    @if (!isset($currentTheater) || $showtime->theater->theater_name !== $currentTheater)
        @if (isset($currentTheater))
            </div>
            </div>
            </div>
        @endif
        @php
            $currentTheater = $showtime->theater->theater_name;
            $currentScreen = '';
        @endphp
        <div class="card my-3 border-0 shadow-lg rounded">
            <div class="card-body">
                <h5 class="card-title mt-1">{{ $currentTheater }}</h5>
    @endif

    @if (!isset($currentScreen) || $showtime->screen->screen_name !== $currentScreen)
        @if (isset($currentScreen))
            </div>
        @endif
        @php $currentScreen = $showtime->screen->screen_name; @endphp
        <div class="col-md-12 mb-2 d-flex align-items-center justify-content-start">
            <h6 class="mr-5">Screen: {{ $currentScreen }} </h6>
    @endif

    <a class="btn btn-light border-dark border btn-sm mt-0 mr-3 d-flex align-items-center"
        href="{{ route('seatbooking', ['movieId' => $movieId, 'showtimeId' => $showtime->id]) }}">
        <span>{{ date('H:i A', strtotime($showtime->showtime)) }}</span>
    </a>
@endforeach
</div>
</div>
</div>
