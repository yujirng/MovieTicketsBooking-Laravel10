@extends('layouts.admin.app')

@section('content')
    <form method="POST" action="{{ route('admin.movies.update', $movie) }}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $movie->title }}" required>
        </div>
        HTML
        <div class="form-group">
            <label for="director">Director:</label>
            <input type="text" class="form-control" id="director" name="director" value="{{ $movie->director }}"
                required>
        </div>
        <div class="form-group">
            <label for="release_date">Release Date:</label>
            <input type="date" class="form-control" id="release_date" name="release_date"
                value="{{ FunctionHelper::formatDateInput($movie->release_date) }}" required>
        </div>
        <div class="form-group">
            <label for="genre_id">Genre:</label>
            <select class="form-control" id="genre_id" name="genre_id" required>
                @foreach ($genres as $genre)
                    <option value="{{ $genre->id }}" {{ $movie->genre_id == $genre->id ? 'selected' : '' }}>
                        {{ $genre->genre_name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="language">Cens:</label>
            <input type="text" class="form-control" id="language" name="language" value="{{ $movie->cens }}" required>
        </div>
        <div class="form-group">
            <label for="trailer_link">Trailer Link:</label>
            <input type="url" class="form-control" id="trailer_link" name="trailer_link"
                value="{{ $movie->trailer_link }}">
        </div>
        <div class="form-group">
            <label for="description">Description:</label>
            <textarea class="form-control" id="description" name="description" rows="3" required>{{ $movie->description }}</textarea>
        </div>
        <div class="form-group">
            <label for="image">Image (Current: {{ $movie->image }}):</label>
            <input type="file" class="form-control" id="image" name="image">
            <img src="{{ Storage::url('movie_images/' . $movie->image) }}" alt="{{ $movie->title }}" class="img-thumbnail"
                width="300px">
            <input type="hidden" value="{{ $movie->image }}" name="old_image">
        </div>
        <div class="form-group">
            <label for="status">Status:</label>
            <select class="form-control" id="status" name="status" required>
                <option value="1" {{ $movie->status ? 'selected' : '' }}>Active</option>
                <option value="0" {{ !$movie->status ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>
        <div class="form-group">
            <label for="running">Running:</label>
            <select class="form-control" id="running" name="running" required>
                <option value="1" {{ $movie->running ? 'selected' : '' }}>Yes</option>
                <option value="0" {{ !$movie->running ? 'selected' : '' }}>No</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update Movie</button>
    </form>
@endsection
