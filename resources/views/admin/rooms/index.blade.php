@extends('layouts.admin.app')

@section('content')
    <a href="{{ route('admin.rooms.create') }}" class="btn btn-primary mb-3">Create New Room</a>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Room Name</th>
                <th>Quantity</th>
                <th>Screen Name</th>
                <th>Theater Name</th>
                <th>Created At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($rooms as $room)
                <tr>
                    <td>{{ $room->id }}</td>
                    <td>{{ $room->room_name }}</td>
                    <td>{{ $room->quantity }}</td>
                    <td>{{ $room->screen_name }}</td>
                    <td>{{ $room->theater->theater_name }}</td>
                    <td>{{ $room->created_at->format('Y-m-d H:i:s') }}</td>
                    <td>
                        <a href="{{ route('admin.rooms.show', $room) }}" class="btn btn-sm btn-info">View</a>
                        <a href="{{ route('admin.rooms.edit', $room) }}" class="btn btn-sm btn-primary">Edit</a>
                        <form method="POST" action="{{ route('admin.rooms.destroy', $room) }}" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
