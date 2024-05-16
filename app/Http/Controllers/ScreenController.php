<?php

namespace App\Http\Controllers;

use App\Models\Screen;
use App\Models\Theater;
use Illuminate\Http\Request;

class ScreenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $screens = Screen::with('theater')->get(); // Eager load theater data
        return view('admin.screens.index', compact('screens'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $theaters = Theater::all();
        return view('admin.screens.create', compact('theaters'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $screen = Screen::create($request->all());
        return redirect()->route('admin.screens.index')->with('success', 'Screen created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Screen  $screen
     * @return \Illuminate\Http\Response
     */
    public function show(Screen $screen)
    {
        $screen->load('theater'); // Eager load theater data
        return view('admin.screens.show', compact('screen'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Screen  $screen
     * @return \Illuminate\Http\Response
     */
    public function edit(Screen $screen)
    {
        $screen->load('theater'); // Eager load theater data
        $theaters = Theater::all();
        return view('admin.screens.edit', compact('screen', 'theaters'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Screen  $screen
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Screen $screen)
    {
        $screen->update($request->all());
        return redirect()->route('admin.screens.index')->with('success', 'Screen updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Screen  $screen
     * @return \Illuminate\Http\Response
     */
    public function destroy(Screen $screen)
    {
        $screen->delete();
        return redirect()->route('admin.screens.index')->with('success', 'Screen deleted successfully!');
    }
}
