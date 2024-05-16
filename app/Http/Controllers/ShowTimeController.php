<?php

namespace App\Http\Controllers;

use App\Models\Showtime;
use App\Models\Movie;
use App\Models\Theater;
use App\Models\Screen;
use Illuminate\Http\Request;

class ShowtimeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $showtimes = Showtime::with('movie', 'theater', 'screen')->get(); // Eager load movie, theater, and screen data
        return view('admin.showtimes.index', compact('showtimes'))
            ->with('title', "Showtimes");;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $movies = Movie::all();
        $theaters = Theater::all();
        $screens = Screen::all();
        return view('admin.showtimes.create', compact('movies', 'theaters', 'screens'))
            ->with('title', "Create Showtime");;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $showtime = Showtime::create($request->all());
        return redirect()->route('admin.showtimes.index')->with('success', 'Showtime created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Showtime  $showtime
     * @return \Illuminate\Http\Response
     */
    public function show(Showtime $showtime)
    {
        $showtime->load('movie', 'theater', 'screen'); // Eager load movie, theater, and screen data
        return view('admin.showtimes.show', compact('showtime'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Showtime  $showtime
     * @return \Illuminate\Http\Response
     */
    public function edit(Showtime $showtime)
    {
        $showtime->load('movie', 'theater', 'screen'); // Eager load movie, theater, and screen data
        $movies = Movie::all();
        $theaters = Theater::all();
        $screens = Screen::all();
        return view('admin.showtimes.edit', compact('showtime', 'movies', 'theaters', 'screens'))
            ->with('title', "Update Showtime");;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Showtime  $showtime
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Showtime $showtime)
    {
        $showtime->update($request->all());
        return redirect()->route('admin.showtimes.index')->with('success', 'Showtime updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Showtime  $showtime
     * @return \Illuminate\Http\Response
     */
    public function destroy(Showtime $showtime)
    {
        $showtime->delete();
        return redirect()->route('admin.showtimes.index')->with('success', 'Showtime deleted successfully!');
    }
    public function getShowtimes(Request $request)
    {

        $date = $request->input('date');
        $theater = $request->input('theater');
        $movieId = $request->input('movieId');

        $showtimes = ShowTime::with(['theater', 'screen'])
            ->where('movie_id', $movieId)
            ->whereDate('showtime', $date)
            ->get();

        return view('partials.showtimes', compact('showtimes', 'movieId'));
    }
}
