@extends('layouts.admin.app')

@section('content')
    <h1>Showtimes</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

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
                    <td>{{ $showtime->theater->theater_name }}</td>
                    <td>{{ $showtime->screen->screen_name }}</td>
                    {{-- <td>{{ $showtime->showtime->format('Y-m-d H:i:s') }}</td> --}}
                    <td>{{ FunctionHelper::formatDateAndTimeFull($showtime->showtime) }}</td>
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

    <a href="{{ route('admin.showtimes.create') }}" class="btn btn-primary">Create New Showtime</a>
@endsection
