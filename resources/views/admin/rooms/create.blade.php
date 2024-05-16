@extends('layouts.admin.app')

@section('content')
    <form method="POST" action="{{ route('admin.rooms.store') }}">
        @csrf
        <div class="form-group">
            <label for="room_name">Room Name:</label>
            <input type="text" class="form-control" id="room_name" name="room_name" value="{{ old('room_name') }}"
                placeholder="Room name" required>
        </div>
        <div class="form-group">
            <label for="quantity">Quantity (Seats):</label>
            <input type="number"min="0" max="999" class="form-control" id="quantity" name="quantity"
                value="{{ old('quantity') }}" placeholder="Enter quantity" required>
        </div>
        <div class="form-group">
            <label for="screen_name">Screen Name:</label>
            <input type="text" class="form-control" id="screen_name" name="screen_name" value="{{ old('screen_name') }}"
                placeholder="Enter screen name" required>
        </div>
        <div class="form-group">
            <label for="theaterId">Theater:</label>
            <select class="form-control" id="theaterId" name="theater_id">
                @foreach ($theaters as $theater)
                    <option value="{{ $theater->id }}">{{ $theater->theater_name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Create Room</button>
    </form>
@endsection
