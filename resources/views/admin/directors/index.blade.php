@extends('layouts.admin.app')

@section('content')
    <a href="{{ route('admin.directors.create') }}" class="btn btn-primary mb-3">Create Director</a>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Director Name</th>
                <th>Birthdate</th>
                <th>Nationality</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($directors as $director)
                <tr>
                    <td>{{ $director->name }}</td>
                    <td>{{ FunctionHelper::convertDate($director->birthdate) }}</td>
                    <td>{{ $director->nationality }}</td>
                    <td>
                        <a href="{{ route('admin.directors.show', $director) }}" class="btn btn-sm btn-info">View</a>
                        <a href="{{ route('admin.directors.edit', $director) }}" class="btn btn-sm btn-primary">Edit</a>
                        <form method="POST" action="{{ route('admin.directors.destroy', $director) }}" class="d-inline">
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
        {{ $directors->links() }}
    </div>
@endsection
