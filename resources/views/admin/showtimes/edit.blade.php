@extends('layouts.admin.app')

@section('content')
    <h1>Edit Showtime</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </div>
    @endif

    <form method="POST" action="{{ route('admin.showtimes.update', $showtime) }}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="movieId">Movie:</label>
            <select class="form-control" id="movieId" name="movie_id">
                @foreach ($movies as $movie)
                    <option value="{{ $movie->id }}" @if ($movie->id == $showtime->movie_id) selected @endif>{{ $movie->title }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="theaterId">Theater:</label>
            <select class="form-control" id="theaterId" name="theater_id">
                @foreach ($theaters as $theater)
                    <option value="{{ $theater->id }}" @if ($theater->id == $showtime->theater_id) selected @endif>
                        {{ $theater->theater_name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="screenId">Screen:</label>
            <select class="form-control" id="screenId" name="screen_id">
                @foreach ($screens as $screen)
                    <option value="{{ $screen->id }}" @if ($screen->id == $showtime->screen_id) selected @endif>
                        {{ $screen->screen_name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="showtime">Showtime:</label>
            <input type="datetime-local" class="form-control" id="showtime" name="showtime"
                value="{{ FunctionHelper::formatDateAndTimeFull($showtime->showtime) }}">
        </div>
        <div class="form-group">
            <label for="price">Price:</label>
            <input type="number" step="0.01" class="form-control" id="price" name="price"
                value="{{ $showtime->price }}">
        </div>
        <button type="submit" class="btn btn-primary">Update Showtime</button>
    </form>
@endsection
