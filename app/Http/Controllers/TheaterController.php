<?php

namespace App\Http\Controllers;

use App\Models\Theater;
use App\Http\Requests\StoreTheaterRequest;
use App\Http\Requests\UpdateTheaterRequest;
use Illuminate\Http\Request;

class TheaterController extends Controller
{
    public function index()
    {
        $theaters = Theater::all();
        return view('theaters.index', compact('theaters'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('theaters.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $theater = Theater::create($request->all());
        return redirect()->route('theaters.index')->with('success', 'Theater created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Theater  $theater
     * @return \Illuminate\Http\Response
     */
    public function show(Theater $theater)
    {
        return view('theaters.show', compact('theater'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Theater  $theater
     * @return \Illuminate\Http\Response
     */
    public function edit(Theater $theater)
    {
        return view('theaters.edit', compact('theater'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Theater  $theater
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Theater $theater)
    {
        $theater->update($request->all());
        return redirect()->route('theaters.index')->with('success', 'Theater updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Theater  $theater
     * @return \Illuminate\Http\Response
     */
    public function destroy(Theater $theater)
    {
        $theater->delete();
        return redirect()->route('theaters.index')->with('success', 'Theater deleted successfully!');
    }
}
