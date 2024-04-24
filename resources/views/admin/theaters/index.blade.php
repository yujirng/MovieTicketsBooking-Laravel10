@extends('layouts.app')

@section('content')
    <h1>Theaters</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Theater Name</th>
                <th>Address</th>
                <th>Phone</th>
                <th>Created At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($theaters as $theater)
                <tr>
                    <td>{{ $theater->id }}</td>
                    <td>{{ $theater->theater_name }}</td>
                    <td>{{ $theater->theater_address }}</td>
                    <td>{{ $theater->theater_phone }}</td>
                    <td>{{ $theater->created_at->format('Y-m-d H:i:s') }}</td>
                    <td>
                        <a href="{{ route('theaters.show', $theater) }}" class="btn btn-sm btn-info">View</a>
                        <a href="{{ route('theaters.edit', $theater) }}" class="btn btn-sm btn-primary">Edit</a>
                        <form method="POST" action="{{ route('theaters.destroy', $theater) }}" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('theaters.create') }}" class="btn btn-primary">Create New Theater</a>
@endsection