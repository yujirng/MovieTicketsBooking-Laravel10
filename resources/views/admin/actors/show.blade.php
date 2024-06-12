@extends('layouts.admin.app')

@section('content')
    <div class="card">
        <div class="card-header">{{ $actor->name }}
        </div>
        <div class="card-body">
            <p><b>Description:</b> {{ $actor->description }}</p>
            <p><b>Birthdate:</b> {{ $actor->birthdate }}</p>
            <p><b>Nationality:</b> {{ $actor->nationality }}</p>
            @if ($actor->image)
                <p><b>Image:</b> </p>
                <img src="{{ Storage::url('actor_images/' . $actor->image) }}" alt="{{ $actor->name }}" class="img-thumbnail"
                    width="300px">
            @endif
        </div>
        <div class="card-footer">
            <a href="{{ route('admin.actors.index') }}" class="btn btn-secondary">Back to List</a>
            <a href="{{ route('admin.actors.edit', $actor) }}" class="btn btn-primary">Edit Movie</a>
        </div>
    </div>
@endsection
