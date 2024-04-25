@extends('layouts.admin.app')

@section('content')
    <h1>Genres</h1>

    <form action="{{ route('admin.genres.index') }}" method="GET">
        <div class="input-group mb-3">
            <input type="text" class="form-control" name="search" value="{{ request()->get('search') }}">
            <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="submit">Search</button>
            </div>
        </div>
    </form>

    <a href="{{ route('genres.create') }}" class="btn btn-primary mb-3">Create New Genre</a>

    @if ($genres->count() > 0)
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Genre Name</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($genres as $genre)
                    <tr>
                        <td>{{ $genre->id }}</td>
                        <td>{{ $genre->genre_name }}</td>
                        <td>{{ $genre->created_at }}</td>
                        <td>{{ $genre->updated_at }}</td>
                        <td>
                            <a href="{{ route('genres.show', $genre->id) }}" class="btn btn-sm btn-info">Show</a>
                            <a href="{{ route('genres.edit', $genre->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            {{-- <form method="POST" action="{{ route('genres.destroy', $genre->id) }}" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form> --}}
                            <a href="{{ route('genres.delete', $genre->id) }}" class="btn btn-sm btn-danger">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $genres->links() }}
    @else
        <p>No genres found.</p>
    @endif
@endsection
