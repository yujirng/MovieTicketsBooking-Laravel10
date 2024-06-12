@extends('layouts.admin.app')

@section('content')
    <form method="POST" action="{{ route('admin.actors.update', $actor) }}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" name="name" required
                value="{{ old('name', $actor->name) }}">
        </div>
        <div class="form-group">
            <label for="description">Description:</label>
            <textarea class="form-control" id="description" name="description" rows="3">{{ old('description', $actor->description) }}</textarea>
        </div>
        <div class="form-group">
            <label for="birthdate">Birthdate:</label>
            <input type="date" class="form-control" id="birthdate" name="birthdate"
                value="{{ old('birthdate', $actor->birthdate) }}">
        </div>
        <div class="form-group">
            <label for="nationality">Nationality:</label>
            <input type="url" class="form-control" id="nationality" name="nationality"
                value="{{ old('nationality', $actor->nationality) }}">
        </div>

        <div class="form-group">
            <label for="image">Image:</label>
            <input type="file" class="form-control" id="image" name="image">
        </div>
        <button type="submit" class="btn btn-primary">Update Movie</button>
    </form>
@endsection
