@extends('layouts.app')

@section('content')
    <h1>Show Screen</h1>

    <div class="card">
        <div class="card-header">
            Screen Details
        </div>
        <div class="card-body">
            <p><strong>ID:</strong> {{ $screen->id }}</p>
            <p><strong>Theater:</strong> {{ $screen->theater->theater_name }}</p>
            <p><strong>Screen Name:</strong> {{ $screen->screen_name }}</p>
            <p><strong>Created At:</strong> {{ $screen->created_at->format('Y-m-d H:i:s') }}</p>
        </div>
    </div>

    <a href="{{ route('screens.index') }}" class="btn btn-primary">Back to List</a>
    <a href="{{ route('screens.edit', $screen) }}" class="btn btn-primary">Edit</a>
@endsection