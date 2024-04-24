@extends('layouts.app')

@section('content')
    <h1>Confirm Genre Delete</h1>

    <p>Are you sure you want to delete the genre <strong>{{ $genre->name }}</strong>?</p>

    <form method="POST" action="{{ route('genres.destroy', ['genre' => $genre->id]) }}">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Delete</button>
        <a href="{{ route('genres.index') }}" class="btn btn-primary">Cancel</a>
    </form>
@endsection