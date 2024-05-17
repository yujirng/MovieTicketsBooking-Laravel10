<?php

namespace App\Http\Controllers;

use App\Models\Showtime;
use App\Models\Movie;
use App\Models\Theater;
use App\Models\Screen;
use App\Models\Room;
use Illuminate\Http\Request;

class ShowtimeController extends Controller
{

    public function index()
    {
        $showtimes = Showtime::with('movie', 'theater', 'room')->get(); // Eager load movie, theater, and screen data
        return view('admin.showtimes.index', compact('showtimes'))
            ->with('title', "Showtimes");;
    }

    public function create()
    {
        $movies = Movie::all();
        $theaters = Theater::all();
        $rooms = Room::all();
        return view('admin.showtimes.create', compact('movies', 'theaters', 'rooms'))
            ->with('title', "Create Showtime");;
    }

    public function store(Request $request)
    {
        $showtime = Showtime::create($request->all());
        return redirect()->route('admin.showtimes.index')->with('success', 'Showtime created successfully!');
    }

    public function show(Showtime $showtime)
    {
        $showtime->load('movie', 'theater', 'room'); // Eager load movie, theater, and screen data
        return view('admin.showtimes.show', compact('showtime'))
            ->with('title', 'Movie Details');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Showtime  $showtime
     * @return \Illuminate\Http\Response
     */
    public function edit(Showtime $showtime)
    {
        $showtime->load('movie', 'theater', 'room');
        $movies = Movie::all();
        $theaters = Theater::all();
        $rooms = Room::all();
        return view('admin.showtimes.edit', compact('showtime', 'movies', 'theaters', 'rooms'))
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
        $theaterId = $request->input('theaterId');
        $movieId = $request->input('movieId');

        $showtimesQuery = ShowTime::with(['theater', 'room'])
            ->where('movie_id', $movieId)
            ->whereDate('showtime', $date);

        if ($theaterId) {
            $showtimesQuery->where('theater_id', $theaterId);
        }

        $showtimes = $showtimesQuery->get();

        return view('partials.showtimes', compact('showtimes', 'movieId'));
        // return view('test.show', compact('date', 'theater', 'movieId'));
    }
}
