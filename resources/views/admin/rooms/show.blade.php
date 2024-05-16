@extends('layouts.admin.app')

@section('content')
    <h1>Show Screen</h1>

    <div class="card">
        <div class="card-header">
            Screen Details
        </div>
        <div class="card-body">
            <p><strong>ID:</strong> {{ $room->id }}</p>
            <p><strong>Room Name:</strong> {{ $room->room_name }}</p>
            <p><strong>Quantity Name:</strong> {{ $room->quantity }}</p>
            <p><strong>Screen Name:</strong> {{ $room->screen_name }}</p>
            <p><strong>Theater:</strong> {{ $room->theater->theater_name }}</p>
            <p><strong>Created At:</strong> {{ $room->created_at->format('Y-m-d H:i:s') }}</p>
        </div>
    </div>

    <a href="{{ route('admin.rooms.index') }}" class="btn btn-primary">Back to List</a>
    <a href="{{ route('admin.rooms.edit', $room) }}" class="btn btn-primary">Edit</a>
@endsection
