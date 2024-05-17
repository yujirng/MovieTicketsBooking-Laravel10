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
        $movies = Movie::with('genre')->paginate(10);
        return view('admin.movies.index', compact('movies'))
            ->with('title', "Movies");;
    }

    public function create()
    {
        $genres = Genre::all();
        return view('admin.movies.create', compact('genres'))
            ->with('title', "Create Movie");;
    }

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

            return redirect()->route('admin.movies.index')->with('success', 'Movie created successfully!');
        } catch (\Throwable $e) {
            return back()->withInput()->withErrors(['error' => 'An error occurred while creating the movie. Please try again.']);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return back()->withInput()->withErrors($e->validator->errors());
        }
    }

    public function show(Movie $movie)
    {
        $movie = $movie->load('genre');
        return view('admin.movies.show', compact('movie'))
            ->with('title', "Movie Details");;
    }

    public function edit(Movie $movie)
    {
        $genres = Genre::all(); // Get all genres for dropdown
        $movie = $movie->load('genre'); // Eager load genre
        return view('admin.movies.edit', compact('genres', 'movie'))
            ->with('title', "Update Movie");;
    }

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

        return redirect()->route('admin.movies.index')->with('success', 'Movie updated successfully!');
    }

    public function destroy(Movie $movie)
    {
        $movie->delete();

        return redirect()->route('admin.movies.index')->with('success', 'Movie deleted successfully!')
            ->with('title', "Delete Movie");;
    }

    public function indexMovie(Movie $movie)
    {
        $runningMovies = Movie::where('running', 1)->where('status', 1)->get();
        $upcomingMovies = Movie::where('running', 0)->where('status', 1)->get();

        $genres = Genre::pluck('genre_name');

        return view('app.index', compact('runningMovies', 'upcomingMovies', 'genres'));
    }


    public function detailMovie($id)
    {
        $movie = Movie::with('showtimes')->find($id);
        $genres = Genre::pluck('genre_name');

        if (!$movie) {
            abort(404);
        }

        $currentMovies = Movie::where('running', 1)->limit(3)->get();

        $dates = [];
        for ($i = 0; $i < 4; $i++) {
            $dates[] = [
                'date' => date('Y-m-d', strtotime("+$i days")),
                'formatted_date' => date('D, M j', strtotime("+$i days")),
            ];
        }

        return view('app.movies.details', compact('movie', 'currentMovies', 'dates', 'genres'));
    }

    public function allMovies(Request $request)
    {
        $genres = Genre::all()->pluck('genre_name', 'id');
        $languages = Movie::distinct()->select('language')->where('status', 1)->orderBy('language', 'desc')->get()->pluck('language'); // Eloquent approach
        return view('app.movies.all', compact('genres', 'languages'));
    }

    public function fetchMovies(Request $request)
    {
        $search = $request->get('search');
        $genreIds = $request->get('genre_id');
        $languages = $request->get('language');

        $movies = Movie::where('status', 1)
            ->when($search, function ($query, $search) {
                return $query->where('title', 'like', "%$search%");
            })
            ->when($genreIds, function ($query, $genreIds) {
                return $query->whereIn('genre_id', $genreIds);
            })
            ->when($languages, function ($query, $languages) {
                return $query->whereIn('language', $languages);
            })
            ->get();

        return response()->json([
            'movies' => $movies->toArray(),
        ], 200);
    }

    public function fetch(Request $request)
    {
        $search = $request->input('search');
        $genre_ids = $request->input('genre_id');
        $languages = $request->input('language');
        $running = $request->input('running');
        $upcomming = $request->input('upcomming');

        $query = Movie::query()->where('status', 1);

        if (!empty($search)) {
            $query->where('title', 'like', '%' . $search . '%');
        }

        if (!empty($genre_ids)) {
            $query->whereIn('genre_id', $genre_ids);
        }

        if (!empty($languages)) {
            $query->whereIn('language', $languages);
        }

        if (!empty($running) && !empty($upcomming)) {
        } else {
            if (!empty($running)) {
                $query->where('running', 1);
            }

            if (!empty($upcomming)) {
                $query->where('running', 0);
            }
        }

        $movies = $query->get();

        return view('app.movies.filtered', compact('movies'));
    }
}
