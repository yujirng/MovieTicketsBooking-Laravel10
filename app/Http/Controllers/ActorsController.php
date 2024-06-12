<?php

namespace App\Http\Controllers;

use App\Models\Actor;
use App\Http\Requests\StoreActorsRequest;
use App\Http\Requests\UpdateActorsRequest;
use Illuminate\Http\Request;

class ActorsController extends Controller
{

    public function index()
    {
        $actors = Actor::paginate(10);
        return view('admin.actors.index', compact('actors'))
            ->with('title', "Actors");;
    }


    public function create()
    {
        return view('admin.actors.create')
            ->with('title', "Create Actor");;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'birthdate' => 'nullable|date',
            'nationality' => 'nullable|string|max:100',
            'image' => 'nullable|file|image|max:2048',
        ]);

        try {
            $data = $request->all();

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $image->storeAs('public/actors_image', $imageName);
                $data['image'] = $imageName;
            } else {
                $data['image'] = 'default_image.jpg';
            }

            Actor::create($data);

            return redirect()->route('admin.actors.index')->with('success', 'Actor created successfully!');
        } catch (\Throwable $e) {
            return back()->withInput()->withErrors(['error' => 'An error occurred while updating the actor. Please try again.']);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return back()->withInput()->withErrors($e->validator->errors());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Actor $actor)
    {
        return view('admin.actors.show', compact('actor'))
            ->with('title', "Actor Details");
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Actor $actor)
    {
        return view('admin.actors.edit', compact('actor'))
            ->with('title', "Edit Actor");
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Actor $actor)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'birthdate' => 'nullable|date',
            'nationality' => 'nullable|string|max:100',
            'image' => 'nullable|file|image|max:2048',
        ]);

        try {
            $data = $request->all();

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $image->storeAs('public/actor_images', $imageName);
                $data['image'] = $imageName;
            }

            $actor->update($data);

            return redirect()->route('admin.actors.index')->with('success', 'Actor created successfully!');
        } catch (\Throwable $e) {
            return back()->withInput()->withErrors(['error' => 'An error occurred while updating the actor. Please try again.']);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return back()->withInput()->withErrors($e->validator->errors());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Actor $actor)
    {
        //
    }
}
