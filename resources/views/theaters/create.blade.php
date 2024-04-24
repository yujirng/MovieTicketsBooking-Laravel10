@extends('layouts.app')

@section('content')
    <h1>Create New Theater</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </div>
    @endif

    <form method="POST" action="{{ route('theaters.store') }}">
        @csrf
        <div class="form-group">
            <label for="theaterName">Theater Name:</label>
            <input type="text" class="form-control" id="theaterName" name="theater_name" placeholder="Enter theater name">
        </div>
        <div class="form-group">
            <label for="theaterAddress">Theater Address:</label>
            <input type="text" class="form-control" id="theaterAddress" name="theater_address" placeholder="Enter theater address">
        </div>
        <div class="form-group">
            <label for="theaterPhone">Theater Phone:</label>
            <input type="text" class="form-control" id="theaterPhone" name="theater_phone" placeholder="Enter theater phone number">
        </div>
        <button type="submit" class="btn btn-primary">Create Theater</button>
    </form>
@endsection