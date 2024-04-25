@extends('layouts.admin.app')

@section('content')
    <h1>Show Showtime</h1>

    <div class="card">
        <div class="card-header">
            Showtime Details
        </div>
        <div class="card-body">
            <p><strong>ID:</strong> {{ $showtime->id }}</p>
            <p><strong>Movie:</strong> {{ $showtime->movie->title }}</p>
            <p><strong>Theater:</strong> {{ $showtime->theater->theater_name }}</p>
            <p><strong>Screen:</strong> {{ $showtime->screen->screen_name }}</p>
            <p><strong>Showtime:</strong> {{ $showtime->showtime->format('Y-m-d H:i:s') }}</p>
            <p><strong>Price:</strong> {{ $showtime->price }}</p>
        </div>
    </div>

    <a href="{{ route('admin.showtimes.index') }}" class="btn btn-primary">Back to List</a>
    <a href="{{ route('admin.showtimes.edit', $showtime) }}" class="btn btn-primary">Edit</a>
@endsection
