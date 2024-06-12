@extends('layouts.admin.app')

@section('content')
    <div class="card">
        <div class="card-header">{{ $director->name }}
        </div>
        <div class="card-body">
            <p><b>Description:</b> {{ $director->description }}</p>
            <p><b>Birthdate:</b> {{ $director->birthdate }}</p>
            <p><b>Nationality:</b> {{ $director->nationality }}</p>
            @if ($director->image)
                <p><b>Image:</b> </p>
                <img src="{{ Storage::url('director_images/' . $director->image) }}" alt="{{ $director->image }}"
                    class="img-thumbnail" width="300px">
            @endif
        </div>
        <div class="card-footer">
            <a href="{{ route('admin.directors.index') }}" class="btn btn-secondary">Back to List</a>
            <a href="{{ route('admin.directors.edit', $director) }}" class="btn btn-primary">Edit Movie</a>
        </div>
    </div>
@endsection
