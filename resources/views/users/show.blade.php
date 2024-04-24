@extends('layouts.app')

@section('content')
    <h1>User Details</h1>

    <div class="card">
        <div class="card-header">
            {{ $user->name }}
        </div>
        <div class="card-body">
            <ul>
                <li>Email: {{ $user->email }}</li>
                <li>Phone: {{ $user->phone }}</li>
                <li>Birthday: {{ $user->birthday }}</li>
                <li>Gender: {{ $user->gender ? 'Male' : 'Female' }}</li>
            </ul>
        </div>
    </div>

    {{-- @can('edit-user', $user)
        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary">Edit</a>
    @endcan --}}

    {{-- @can('delete-user', $user) --}}
        <form method="POST" action="{{ route('users.destroy', $user->id) }}" class="d-inline">
            @method('DELETE')
            @csrf
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
    {{-- @endcan --}}
@endsection
