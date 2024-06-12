@extends('layouts.admin.app')

@section('content')
    <a href="{{ route('admin.users.create') }}" class="btn btn-primary mb-3">Create New User</a>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Birthday</th>
                <th>Gender</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->phone }}</td>
                    <td>{{ $user->birthday }}</td>
                    <td>{{ $user->gender ? 'Male' : 'Female' }}</td>
                    <td>
                        <a href="{{ route('admin.users.show', $user->id) }}" class="btn btn-info">Show</a>
                        <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-primary">Edit</a>
                        {{-- <form method="POST" action="{{ route('admin.users.destroy', $user->id) }}" class="d-inline">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form> --}}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
