@extends('layouts.admin.app')

@section('content')
    <form method="POST" action="{{ route('admin.genres.store') }}">
        @csrf
        <div class="form-group">
            <label for="genre_name">Genre Name:</label>
            <input type="text" class="form-control" id="genre_name" name="genre_name" value="{{ old('genre_name') }}">
            @error('genre_name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
@endsection
