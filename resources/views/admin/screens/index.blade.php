@extends('layouts.admin.app')

@section('content')
    <h1>Screens</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Screen Name</th>
                <th>Theater Name</th>
                <th>Created At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($screens as $screen)
                <tr>
                    <td>{{ $screen->id }}</td>
                    <td>{{ $screen->screen_name }}</td>
                    <td>{{ $screen->theater->theater_name }}</td>
                    <td>{{ $screen->created_at->format('Y-m-d H:i:s') }}</td>
                    <td>
                        <a href="{{ route('screens.show', $screen) }}" class="btn btn-sm btn-info">View</a>
                        <a href="{{ route('screens.edit', $screen) }}" class="btn btn-sm btn-primary">Edit</a>
                        <form method="POST" action="{{ route('screens.destroy', $screen) }}" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('screens.create') }}" class="btn btn-primary">Create New Screen</a>
@endsection
