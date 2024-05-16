@extends('layouts.admin.app')

@section('content')
    <h1>Movie Details</h1>

    <div class="card">
        <div class="card-header">{{ $movie->title }}</div>
        <div class="card-body">
            <p><b>Director:</b> {{ $movie->director }}</p>
            <p><b>Release Date:</b> {{ $movie->release_date->format('Y-m-d') }}</p>
            <p><b>Genre:</b> {{ $movie->genre->name }}</p>
            <p><b>Language:</b> {{ $movie->language }}</p>
            @if ($movie->trailer_link)
                <p><b>Trailer:</b> <a href="{{ $movie->trailer_link }}">Watch Trailer</a></p>
            @endif
            <p><b>Description:</b> {{ $movie->description }}</p>
            @if ($movie->image)
                <img src="{{ $movie->image }}" alt="{{ $movie->title }}" class="img-thumbnail">
            @endif
            <p><b>Status:</b> {{ $movie->status ? 'Active' : 'Inactive' }}</p>
            <p><b>Running:</b> {{ $movie->running ? 'Yes' : 'No' }}</p>
        </div>
        <div class="card-footer">
            <a href="{{ route('admin.movies.index') }}" class="btn btn-secondary">Back to List</a>
            <a href="{{ route('admin.movies.edit', $movie) }}" class="btn btn-primary">Edit Movie</a>
        </div>
    </div>
@endsection
