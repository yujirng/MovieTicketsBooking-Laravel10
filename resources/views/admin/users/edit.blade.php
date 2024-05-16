@extends('layouts.admin.app')

@section('content')
    <h1>Edit User</h1>

    <form method="POST" action="{{ route('admin.users.update', $user->id) }}">
        @method('PUT')
        @csrf

        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" required>
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" required>
        </div>

        <div class="form-group">
            <label for="password">Password (optional):</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Enter new password">
        </div>

        <div class="form-group">
            <label for="password_confirmation">Confirm Password:</label>
            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation"
                placeholder="Confirm new password">
        </div>

        <div class="form-group">
            <label for="phone">Phone Number:</label>
            <input type="tel" class="form-control" id="phone" name="phone" value="{{ $user->phone }}" required>
        </div>

        <div class="form-group">
            <label for="birthday">Birthday:</label>
            <input type="date" class="form-control" id="birthday" name="birthday" value="{{ $user->birthday }}"
                required>
        </div>

        <div class="form-group">
            <label for="image">Image (optional):</label>
            <input type="file" class="form-control-file" id="image" name="image">
            @if ($user->image)
                <img src="{{ asset('storage/' . $user->image) }}" alt="User Image" class="mt-2" style="width: 100px">
            @endif
        </div>

        <div class="form-group">
            <label for="gender">Gender:</label>
            <select class="form-control" id="gender" name="gender" required>
                <option value="1" {{ $user->gender ? 'selected' : '' }}>Male</option>
                <option value="0" {{ !$user->gender ? 'selected' : '' }}>Female</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update User</button>
    </form>
@endsection
