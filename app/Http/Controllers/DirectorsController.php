<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDirectorsRequest;
use App\Http\Requests\UpdateDirectorsRequest;
use App\Models\Director;
use Illuminate\Http\Request;

class DirectorsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $directors = Director::paginate(10);
        return view('admin.directors.index', compact('directors'))
            ->with('title', "Directors");;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.directors.create')
            ->with('title', "Create Director");;
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
                $image->storeAs('public/director_images', $imageName);
                $data['image'] = $imageName;
            } else {
                $data['image'] = 'default_image.jpg';
            }

            Director::create($data);

            return redirect()->route('admin.directors.index')->with('success', 'Director created successfully!');
        } catch (\Throwable $e) {
            return back()->withInput()->withErrors(['error' => 'An error occurred while updating the director. Please try again.']);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return back()->withInput()->withErrors($e->validator->errors());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Director $director)
    {
        return view('admin.directors.show', compact('director'))
            ->with('title', "Director Details");
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Director $director)
    {
        return view('admin.directors.edit', compact('director'))
            ->with('title', "Edit Director");
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Director $director)
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
                $image->storeAs('public/director_images', $imageName);
                $data['image'] = $imageName;
            }

            $director->update($data);

            return redirect()->route('admin.directors.index')->with('success', 'Director created successfully!');
        } catch (\Throwable $e) {
            return back()->withInput()->withErrors(['error' => 'An error occurred while updating the director. Please try again.']);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return back()->withInput()->withErrors($e->validator->errors());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Director $director)
    {
        //
    }
}
