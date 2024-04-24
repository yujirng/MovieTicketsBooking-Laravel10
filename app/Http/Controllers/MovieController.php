<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Http\Requests\StoreMovieRequest;
use App\Http\Requests\UpdateMovieRequest;
use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MovieController extends Controller
{
    public function index()
    {
        $movies = Movie::with('genre')->paginate(10); // Paginate results (optional)
        return view('movies.index', compact('movies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $genres = Genre::all(); // Get all genres for dropdown
        return view('movies.create', compact('genres'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:100',
            'director' => 'required|string|max:100',
            'release_date' => 'required|date',
            'genre_id' => 'required|exists:genres,id',
            'language' => 'required|string|max:100',
            'trailer_link' => 'nullable|url|max:255',
            'description' => 'required|string|max:300',
            // 'image' => 'nullable|string|max:100',
            'image' => 'nullable|file|image|max:2048',
            'status' => 'required|integer',
            'running' => 'required|integer',
        ]);

        try {
            $data = $request->all();

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $image->storeAs('public/movie_images', $imageName);
                $data['image'] = $imageName;
            }

            Movie::create($data);

            return redirect()->route('movies.index')->with('success', 'Movie created successfully!');
        } catch (\Throwable $e) {
            // Handle general errors here (e.g., database errors)
            return back()->withInput()->withErrors(['error' => 'An error occurred while creating the movie. Please try again.']);
        } catch (\Illuminate\Validation\ValidationException $e) {
            // Handle validation errors with more specific messages
            return back()->withInput()->withErrors($e->validator->errors());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function show(Movie $movie)
    {
        $movie = $movie->load('genre'); // Eager load genre
        return view('movies.show', compact('movie'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function edit(Movie $movie)
    {
        $genres = Genre::all(); // Get all genres for dropdown
        $movie = $movie->load('genre'); // Eager load genre
        return view('movies.edit', compact('genres', 'movie'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Movie $movie)
    {
        $request->validate([
            'title' => 'required|string|max:100',
            'director' => 'required|string|max:100',
            'release_date' => 'required|date',
            'genre_id' => 'required|exists:genres,id',
            'language' => 'required|string|max:100',
            'trailer_link' => 'nullable|url|max:255',
            'description' => 'required|string|max:300',
            'image' => 'nullable|file|image|max:2048',
            'status' => 'required|integer',
            'running' => 'required|integer',
        ]);

        if ($request->hasFile('image')) {
            $newImage = $request->file('image');
            $newImageName = time() . '.' . $newImage->getClientOriginalExtension();
            $newImage->storeAs('public/movie_images', $newImageName);

            // Xóa ảnh cũ (nếu có)
            if ($movie->image) {
                Storage::delete('public/movie_images/' . $movie->image);
            }

            // Cập nhật tên ảnh mới vào dữ liệu request
            $request->request->add(['image' => $newImageName]);
        }

        $movie->update($request->all());

        return redirect()->route('movies.index')->with('success', 'Movie updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Movie $movie)
    {
        $movie->delete();

        return redirect()->route('movies.index')->with('success', 'Movie deleted successfully!');
    }
}
