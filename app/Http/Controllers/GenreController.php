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

        return view('genres.index', compact('genres', 'searchTerm'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('genres.create');
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

        return redirect()->route('genres.index')
            ->with('success', 'Genre created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $genre = Genre::findOrFail($id);
        return view('genres.show', compact('genre'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $genre = Genre::findOrFail($id);
        return view('genres.edit', compact('genre'));
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

        return redirect()->route('genres.index')
            ->with('success', 'Genre updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $id)
    {
        $genre = Genre::findOrFail($id);
        return view('genres.delete', ['genre' => $genre]);
        //
    }

    public function destroy(Request $request, string $id)
    {
        $genre = Genre::findOrFail($id);
        $genre->delete();


        return redirect()->route('genres.index')
            ->with('success', 'Genre deleted successfully.');
    }
}
