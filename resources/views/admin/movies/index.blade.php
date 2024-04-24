@extends('layouts.app')

@section('content')
    <h1>Movies</h1>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Title</th>
                <th>Director</th>
                <th>Release Date</th>
                <th>Genre</th>
                <th>Language</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($movies as $movie)
                <tr>
                    <td>{{ $movie->title }}</td>
                    <td>{{ $movie->director }}</td>
                    <td>{{ FunctionHelper::convertDate('2002-02-12', 'Y-m-d', 'd/m/Y') }}</td>
                    <td>{{ $movie->genre->genre_name }}</td>
                    <td>{{ $movie->language }}</td>
                    <td>
                        <a href="{{ route('movies.show', $movie) }}" class="btn btn-sm btn-info">View</a>
                        <a href="{{ route('movies.edit', $movie) }}" class="btn btn-sm btn-primary">Edit</a>
                        <form method="POST" action="{{ route('movies.destroy', $movie) }}" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('movies.create') }}" class="btn btn-primary">Create Movie</a>
@endsection
