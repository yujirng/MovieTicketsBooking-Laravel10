@extends('layouts.admin.app')

@section('content')
    <div class="card">
        <div class="card-header">{{ $movie->title }}</div>
        <div class="card-body">
            <p><b>Director:</b> {{ $movie->director }}</p>
            <p><b>Release Date:</b> {{ FunctionHelper::convertDate($movie->release_date) }}</p>
            <p><b>Genre:</b> {{ $movie->genre->genre_name }}</p>
            <p><b>Language:</b> {{ $movie->cens }}</p>
            @if ($movie->trailer_link)
                <p><b>Trailer:</b> <a href="{{ $movie->trailer_link }}">Watch Trailer</a></p>
            @endif
            <p><b>Description:</b> {{ $movie->description }}</p>
            @if ($movie->image)
                <img src="{{ Storage::url('movie_images/' . $movie->image) }}" alt="{{ $movie->title }}" class="img-thumbnail"
                    width="300px">
            @endif
            <p><b>Status:</b> <span
                    class="badge {{ $movie->status ? 'bg-success' : 'bg-warning' }}">{{ $movie->status ? 'Active' : 'Inactive' }}</span>
            </p>
            <p><b>Running:</b> <span
                    class="badge {{ $movie->running ? 'bg-success' : 'bg-warning' }}">{{ $movie->running ? 'Yes' : 'No' }}</span>
            </p>
        </div>
        <div class="card-footer">
            <a href="{{ route('admin.movies.index') }}" class="btn btn-secondary">Back to List</a>
            <a href="{{ route('admin.movies.edit', $movie) }}" class="btn btn-primary">Edit Movie</a>
        </div>
    </div>
@endsection
