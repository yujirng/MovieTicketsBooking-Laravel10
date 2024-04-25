@extends('layouts.admin.app')

@section('content')
    <h1>Edit Theater</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </div>
    @endif

    <form method="POST" action="{{ route('theaters.update', $theater) }}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="theaterName">Theater Name:</label>
            <input type="text" class="form-control" id="theaterName" name="theater_name" value="{{ $theater->theater_name }}">
        </div>
        <div class="form-group">
            <label for="theaterAddress">Theater Address:</label>
            <input type="text" class="form-control" id="theaterAddress" name="theater_address"
                value="{{ $theater->theater_address }}">
        </div>
        <div class="form-group">
            <label for="theaterPhone">Theater Phone:</label>
            <input type="text" class="form-control" id="theaterPhone" name="theater_phone"
                value="{{ $theater->theater_phone }}">
        </div>
        <button type="submit" class="btn btn-primary">Update Theater</button>
    </form>
@endsection
