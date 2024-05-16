@extends('layouts.admin.app')

@section('content')
    <h1>Create New Screen</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </div>
    @endif

    <form method="POST" action="{{ route('admin.screens.store') }}">
        @csrf
        <div class="form-group">
            <label for="theaterId">Theater:</label>
            <select class="form-control" id="theaterId" name="theater_id">
                @foreach ($theaters as $theater)
                    <option value="{{ $theater->id }}">{{ $theater->theater_name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="screenName">Screen Name:</label>
            <input type="text" class="form-control" id="screenName" name="screen_name" placeholder="Enter screen name">
        </div>
        <button type="submit" class="btn btn-primary">Create Screen</button>
    </form>
@endsection
