<?php

namespace App\Http\Controllers;

use App\Models\Actors;
use App\Http\Requests\StoreActorsRequest;
use App\Http\Requests\UpdateActorsRequest;

class ActorsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreActorsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Actors $actors)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Actors $actors)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateActorsRequest $request, Actors $actors)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Actors $actors)
    {
        //
    }
}
