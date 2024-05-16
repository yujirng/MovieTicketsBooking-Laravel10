@extends('layouts.admin.app')

@section('content')
    <h1>Show Genre</h1>

    <div class="card">
        <div class="card-header">
            {{ $genre->genre_name }}
        </div>
        <div class="card-body">
            <p><strong>ID:</strong> {{ $genre->id }}</p>
            <p><strong>Genre Name:</strong> {{ $genre->genre_name }}</p>
            <p><strong>Created At:</strong> {{ $genre->created_at }}</p>
            <p><strong>Updated At:</strong> {{ $genre->updated_at }}</p>
        </div>
        <div class="card-footer">
            <a href="{{ route('admin.genres.index') }}" class="btn btn-secondary">Back to List</a>
            <a href="{{ route('admin.genres.edit', $genre->id) }}" class="btn btn-warning">Edit</a>
            <form method="POST" action="{{ route('admin.genres.destroy', $genre->id) }}" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </div>
    </div>
@endsection
