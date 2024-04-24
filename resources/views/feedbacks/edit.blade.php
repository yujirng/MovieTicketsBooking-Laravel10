@extends('layouts.app')

@section('content')
    <h1>Edit Genre</h1>

    <form method="POST" action="{{ route('genres.update', $genre->id) }}">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="genre_name">Genre Name:</label>
        <input type="text" class="form-control" id="genre_name" name="genre_name" value="{{ $genre->genre_name }}">
        @error('genre_name')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
</form>
@endsection