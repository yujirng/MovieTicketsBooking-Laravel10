@extends('layouts.admin.app')

@section('content')
    <a href="{{ route('admin.movies.create') }}" class="btn btn-primary mb-3">Create Movie</a>

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
                        <a href="{{ route('admin.movies.show', $movie) }}" class="btn btn-sm btn-info">View</a>
                        <a href="{{ route('admin.movies.edit', $movie) }}" class="btn btn-sm btn-primary">Edit</a>
                        <form method="POST" action="{{ route('admin.movies.destroy', $movie) }}" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="row d-flex justify-content-center">
        {{ $movies->links() }}
    </div>
@endsection
