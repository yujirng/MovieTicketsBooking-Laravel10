HTML
@extends('layouts.admin.app')

@section('content')
    <h1>Show Theater</h1>

    <div class="card">
        <div class="card-header">
            Theater Details
        </div>
        <div class="card-body">
            <p><strong>ID:</strong> {{ $theater->id }}</p>
            <p><strong>Name:</strong> {{ $theater->theater_name }}</p>
            <p><strong>Address:</strong> {{ $theater->theater_address }}</p>
            <p><strong>Phone:</strong> {{ $theater->theater_phone }}</p>
            <p><strong>Created At:</strong> {{ $theater->created_at->format('Y-m-d H:i:s') }}</p>
        </div>
    </div>

    <a href="{{ route('theaters.index') }}" class="btn btn-primary">Back to List</a>
    <a href="{{ route('theaters.edit', $theater) }}" class="btn btn-primary">Edit</a>
@endsection
