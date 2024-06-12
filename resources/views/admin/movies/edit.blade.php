@extends('layouts.admin.app')

@section('content')
    <form method="POST" enctype="multipart/form-data" action="{{ route('admin.movies.update', $movie) }}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $movie->title) }}"
                required>
        </div>
        <div class="form-group">
            <label for="director_id">Director</label>
            <select class="form-control" id="director_id" name="director_id">
                @foreach ($directors as $director)
                    <option value="{{ $director->id }}"
                        {{ old('director_id', $movie->director->id) == $director->id ? 'selected' : '' }}>
                        {{ $director->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="release_date">Release Date:</label>
            <input type="date" class="form-control" id="release_date" name="release_date"
                value="{{ FunctionHelper::formatDateInput(old('release_date', $movie->release_date)) }}" required>
        </div>
        <div class="form-group">
            <label for="actors">Actors</label>
            <select multiple class="form-control" id="actors" name="actors[]">
                @foreach ($actors as $actor)
                    <option value="{{ $actor->id }}"
                        {{ in_array($actor->id, old('actors', $movie->actors->pluck('id')->toArray())) ? 'selected' : '' }}>
                        {{ $actor->name }}
                    </option>
                @endforeach
            </select>
            <small class="form-text text-muted">Hold down the Ctrl (Windows) or Command (Mac) button to select multiple
                options.</small>
        </div>
        <div class="form-group">
            <label for="genre_id">Genre:</label>
            <select multiple class="form-control" id="genres" name="genres[]">
                @foreach ($genres as $genre)
                    <option value="{{ $genre->id }}"
                        {{ in_array($genre->id, old('genres', $movie->genres->pluck('id')->toArray())) ? 'selected' : '' }}>
                        {{ $genre->genre_name }}
                    </option>
                @endforeach
            </select>
            <small class="form-text text-muted">Hold down the Ctrl (Windows) or Command (Mac) button to select multiple
                options.</small>
        </div>
        <div class="form-group">
            <label for="trailer_link">Trailer Link:</label>
            <input type="url" class="form-control" id="trailer_link" name="trailer_link"
                value="{{ old('trailer_link', $movie->trailer_link) }}">
        </div>
        <div class="form-group">
            <label for="description">Description:</label>
            <textarea class="form-control" id="description" name="description" rows="3" required>{{ old('description', $movie->description) }}</textarea>
        </div>
        <div class="form-group">
            <label for="image">Image (Current: {{ $movie->image }}):</label>
            <input type="file" class="form-control" id="image" name="image">
            <img src="{{ Storage::url('movie_images/' . $movie->image) }}" alt="{{ $movie->title }}" class="img-thumbnail"
                width="300px">
            <input type="hidden" value="{{ $movie->image }}" name="old_image">
        </div>
        <div class="form-group">
            <label for="cens">Movie Cens:</label>
            <select class="form-control" id="cens" name="cens" required>
                @foreach ($censorshipOptions as $option)
                    <option value="{{ $option }}" {{ old('cens', $movie->cens) == $option ? 'selected' : '' }}>
                        {{ $option }}</option>
                @endforeach
            </select>
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
