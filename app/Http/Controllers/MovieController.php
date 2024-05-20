<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Http\Requests\StoreMovieRequest;
use App\Http\Requests\UpdateMovieRequest;
use App\Models\Genre;
use App\Models\Director;
use App\Models\Actor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class MovieController extends Controller
{
    public function index()
    {
        $movies = Movie::with('genres')->paginate(10);
        return view('admin.movies.index', compact('movies'))
            ->with('title', "Movies");;
    }

    public function create()
    {
        $genres = Genre::all();
        $directors = Director::all();
        $actors = Actor::all();
        $censorshipOptions = ['P', 'K', 'T13', 'T16', 'T18', 'C'];
        return view('admin.movies.create', compact('genres', 'directors', 'actors', 'censorshipOptions'))
            ->with('title', "Create Movie");;
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:100',
            'release_date' => 'required|date',
            'cens' => 'required|string|max:10',
            'trailer_link' => 'nullable|url|max:255',
            'description' => 'required|string',
            'image' => 'required|file|image|max:2048',
            'status' => 'required|integer',
            'running' => 'required|integer',
            'director_id' => 'required|exists:directors,id',
            'genres' => 'array|exists:genres,id',
            'actors' => 'array|exists:actors,id',
        ]);

        try {
            $data = $request->all();

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $image->storeAs('public/movie_images', $imageName);
                $data['image'] = $imageName;
            }

            $movie = Movie::create($data);

            // $movie->director()->associate($request->input('director_id'));
            $movie->save();
            $movie->genres()->sync($request->input('genres', []));
            $movie->actors()->sync($request->input('actors', []));


            return redirect()->route('admin.movies.index')->with('success', 'Movie created successfully!');
        } catch (\Throwable $e) {
            return back()->withInput()->withErrors(['error' => 'An error occurred while updating the movie. Please try again.']);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return back()->withInput()->withErrors($e->validator->errors());
        }
    }

    public function show(Movie $movie)
    {
        $movie = $movie->load('genres', 'actors', 'director');
        return view('admin.movies.show', compact('movie'))
            ->with('title', "Movie Details");;
    }

    public function edit(Movie $movie)
    {

        $genres = Genre::all();
        $directors = Director::all();
        $actors = Actor::all();
        $censorshipOptions = ['P', 'K', 'T13', 'T16', 'T18', 'C'];
        return view('admin.movies.edit', compact('movie', 'genres', 'directors', 'actors', 'censorshipOptions'))
            ->with('title', "Update Movie");;
    }

    public function update(Request $request, Movie $movie)
    {
        $request->validate([
            'title' => 'required|string|max:100',
            'director_id' => 'required|exists:directors,id',
            'release_date' => 'required|date',
            'cens' => 'required|string|max:10',
            'trailer_link' => 'nullable|url|max:255',
            'description' => 'required|string',
            'image' => 'nullable|file|image|max:2048',
            'status' => 'required|integer',
            'running' => 'required|integer',
            'old_image' => 'required|string',
            'genres' => 'array|exists:genres,id',
            'actors' => 'array|exists:actors,id',
        ]);

        // dd($request->all());

        if ($request->hasFile('image')) {
            $newImage = $request->file('image');
            $newImageName = time() . '.' . $newImage->getClientOriginalExtension();
            $newImage->storeAs('public/movie_images', $newImageName);

            if ($movie->image) {
                Storage::delete('public/movie_images/' . $movie->image);
            }

            $request->request->add(['image' => $newImageName]);
        } else {
            $request->request->add(['image' => $request->old_image]);;
        }

        $movie->update($request->all());
        $movie->genres()->sync($request->input('genres', []));
        // $movie->director()->associate($request->input('director_id'));
        $movie->actors()->sync($request->input('actors', []));
        $movie->save();

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


    // public function detailMovie($id)
    public function detailMovie(Request $request)
    {
        $movieId = $request->id;

        $movie = Movie::with(['showtimes.room.theater', 'genres', 'actors', 'director'])->find($movieId);
        $genres = Genre::pluck('genre_name');
        $theaters = $movie->showTimes->pluck('room.theater.theater_name', 'room.theater.id');

        if (!$movie) {
            abort(404);
        }

        $currentMovies = Movie::where('status', 1)->limit(3)->get();

        $dates = [];

        // dd($timezone)

        $currentDate = Carbon::now();

        // for ($i = 0; $i < 4; $i++) {
        //     $dates[] = [
        //         'date' => date('Y-m-d', strtotime("+$i days")),
        //         'formatted_date' => date('D, M j', strtotime("+$i days")),
        //     ];
        // }

        for ($i = 0; $i < 4; $i++) {
            $date = $currentDate->copy()->addDays($i);
            $dates[] = [
                'date' => $date->toDateString(),
                'formatted_date' => $date->format('D, M j'),
            ];
        }


        // dd($movie);

        return view('app.movies.details', compact('movie', 'currentMovies', 'dates', 'genres', 'theaters'));
    }

    public function allMovies(Request $request)
    {
        $genres = Genre::all()->pluck('genre_name', 'id');
        return view('app.movies.all', compact('genres'));
    }

    public function fetch(Request $request)
    {
        $search = $request->input('search');
        $genre_ids = $request->input('genre_id');
        // $languages = $request->input('language');
        $running = $request->input('running');
        $upcomming = $request->input('upcomming');

        $query = Movie::query()->where('status', 1);

        if (!empty($search)) {
            $query->where('title', 'like', '%' . $search . '%');
        }

        if (!empty($genre_ids)) {
            $query->whereIn('genre_id', $genre_ids);
        }

        // if (!empty($languages)) {
        //     $query->whereIn('language', $languages);
        // }

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
