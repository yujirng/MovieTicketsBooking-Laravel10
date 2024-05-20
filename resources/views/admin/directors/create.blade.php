@extends('layouts.admin.app')

@section('content')
    <form method="POST" enctype="multipart/form-data" action="{{ route('admin.movies.store') }}">
        @csrf
        <div class="form-group">
            <label for="name">Title:</label>
            <input type="text" class="form-control" id="name" name="name" required value="{{ old('name') }}">
        </div>
        <div class="form-group">
            <label for="description">Description:</label>
            <textarea class="form-control" id="description" name="description" rows="3" required>
                {{ old('description') }}</textarea>
        </div>
        <div class="form-group">
            <label for="birthdate">Birthdate:</label>
            <input type="date" class="form-control" id="birthdate" name="birthdate" value="{{ old('birthdate') }}"
                required>
        </div>
        <div class="form-group">
            <label for="nationality">Nationality:</label>
            <input type="url" class="form-control" id="nationality" name="nationality" value="{{ old('nationality') }}">
        </div>

        <div class="form-group">
            <label for="image">Image:</label>
            <input type="file" class="form-control" id="image" name="image" required>
        </div>
        <button type="submit" class="btn btn-primary">Create Directors</button>
    </form>
@endsection
