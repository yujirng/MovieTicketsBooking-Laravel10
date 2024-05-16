@extends('layouts.admin.app')

@section('content')
    <a href="{{ route('admin.theaters.create') }}" class="btn btn-primary mb-3">Create New Theater</a>

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
                        <a href="{{ route('admin.theaters.show', $theater) }}" class="btn btn-sm btn-info">View</a>
                        <a href="{{ route('admin.theaters.edit', $theater) }}" class="btn btn-sm btn-primary">Edit</a>
                        <form method="POST" action="{{ route('admin.theaters.destroy', $theater) }}" class="d-inline">
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
