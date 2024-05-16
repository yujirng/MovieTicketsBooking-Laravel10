<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $searchTerm = $request->get('search');
        $genres = Genre::searchByName($searchTerm)->paginate(10);

        return view('admin.genres.index', compact('genres', 'searchTerm'))
            ->with('title', "Genres");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.genres.create')
            ->with('title', "Create Genre");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'genre_name' => 'required|max:100',
        ]);

        Genre::create($request->all());

        return redirect()->route('admin.genres.index')
            ->with('success', 'Genre created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $genre = Genre::findOrFail($id);
        return view('admin.genres.show', compact('genre'))
            ->with('title', "Genre Details");;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $genre = Genre::findOrFail($id);
        return view('admin.genres.edit', compact('genre'))
            ->with('title', "Edit Genre");;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'genre_name' => 'required|max:100',
        ]);

        $genre = Genre::findOrFail($id);
        $genre->update($request->all());

        return redirect()->route('admin.genres.index')
            ->with('success', 'Genre updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $id)
    {
        $genre = Genre::findOrFail($id);
        return view('admin.genres.delete', ['genre' => $genre])
            ->with('title', "Delete Genre");;
        //
    }

    public function destroy(Request $request, string $id)
    {
        $genre = Genre::findOrFail($id);
        $genre->delete();


        return redirect()->route('admin.genres.index')
            ->with('success', 'Genre deleted successfully.');
    }
}
