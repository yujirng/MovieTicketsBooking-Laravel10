@extends('layouts.admin.app')

@section('content')
    <a href="{{ route('admin.actors.create') }}" class="btn btn-primary mb-3">Create Actor</a>

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
            @foreach ($actors as $director)
                <tr>
                    <td>{{ $director->name }}</td>
                    <td>{{ FunctionHelper::convertDate($director->birthdate) }}</td>
                    <td>{{ $director->nationality }}</td>
                    <td>
                        <a href="{{ route('admin.actors.show', $director) }}" class="btn btn-sm btn-info">View</a>
                        <a href="{{ route('admin.actors.edit', $director) }}" class="btn btn-sm btn-primary">Edit</a>
                        <form method="POST" action="{{ route('admin.actors.destroy', $director) }}" class="d-inline">
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
        {{ $actors->links() }}
    </div>
@endsection
