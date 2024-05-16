@extends('layouts.admin.app')

@section('content')
    <h1>Edit Screen</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </div>
    @endif

    <form method="POST" action="{{ route('admin.screens.update', $screen) }}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="theaterId">Theater:</label>
            <select class="form-control" id="theaterId" name="theater_id">
                @foreach ($theaters as $theater)
                    <option value="{{ $theater->id }}" @if ($theater->id == $screen->theater_id) selected @endif>
                        {{ $theater->theater_name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="screenName">Screen Name:</label>
            <input type="text" class="form-control" id="screenName" name="screen_name"
                value="{{ $screen->screen_name }}">
        </div>
        <button type="submit" class="btn btn-primary">Update Screen</button>
    </form>
@endsection
