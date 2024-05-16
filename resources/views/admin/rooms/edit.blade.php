@extends('layouts.admin.app')

@section('content')
    <form method="POST" action="{{ route('admin.rooms.update', $room) }}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="room_name">Room Name:</label>
            <input type="text" class="form-control" id="room_name" name="room_name" value="{{ $room->room_name }}"
                placeholder="Room name" required>
        </div>
        <div class="form-group">
            <label for="quantity">Quantity (Seats):</label>
            <input type="number"min="0" max="999" class="form-control" id="quantity" name="quantity"
                value="{{ $room->quantity }}" placeholder="Enter quantity" required>
        </div>
        <div class="form-group">
            <label for="screenName">Screen Name:</label>
            <input type="text" class="form-control" id="screenName" name="screen_name" value="{{ $room->screen_name }}">
        </div>
        <div class="form-group">
            <label for="theaterId">Theater:</label>
            <select class="form-control" id="theaterId" name="theater_id">
                @foreach ($theaters as $theater)
                    <option value="{{ $theater->id }}" @if ($theater->id == $room->theater_id) selected @endif>
                        {{ $theater->theater_name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update Screen</button>
    </form>
@endsection
