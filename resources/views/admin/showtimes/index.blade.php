@extends('layouts.admin.app')

@section('content')
    <a href="{{ route('admin.showtimes.create') }}" class="btn btn-primary mb-3">Create New Showtime</a>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Movie</th>
                <th>Theater</th>
                <th>Screen</th>
                <th>Showtime</th>
                <th>Price</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($showtimes as $showtime)
                <tr>
                    <td>{{ $showtime->id }}</td>
                    <td>{{ $showtime->movie->title }}</td>
                    <td>{{ $showtime->room->theater->theater_name }}</td>
                    <td>{{ $showtime->room->screen_name }}</td>
                    <td>{{ FunctionHelper::formatFullDateTime($showtime->showtime) }}</td>
                    <td>{{ $showtime->price }}</td>
                    <td>
                        <a href="{{ route('admin.showtimes.show', $showtime) }}" class="btn btn-sm btn-info">View</a>
                        <a href="{{ route('admin.showtimes.edit', $showtime) }}" class="btn btn-sm btn-primary">Edit</a>
                        <form method="POST" action="{{ route('admin.showtimes.destroy', $showtime) }}" class="d-inline">
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
