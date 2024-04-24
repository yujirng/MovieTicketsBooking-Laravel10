@extends('layouts.app')

@section('content')
    <h1>Users</h1>

    {{-- @can('create-user') --}}
        <a href="{{ route('users.create') }}" class="btn btn-primary mb-3">Create New User</a>
    {{-- @endcan --}}

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Name</th>
                <th>Username</th>
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
                    <td>{{ $user->username }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->phone }}</td>
                    <td>{{ $user->birthday }}</td>
                    <td>{{ $user->gender ? 'Male' : 'Female' }}</td>
                    <td>
                            <a href="{{ route('users.show', $user->id) }}" class="btn btn-primary">Show</a>
                        {{-- @can('edit-user', $user) --}}
                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary">Edit</a>
                        {{-- @endcan --}}
                        {{-- @can('delete-user', $user) --}}
                            <form method="POST" action="{{ route('users.destroy', $user->id) }}" class="d-inline">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        {{-- @endcan --}}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
