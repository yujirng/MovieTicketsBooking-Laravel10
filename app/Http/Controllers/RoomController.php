<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Http\Requests\StoreRoomRequest;
use App\Http\Requests\UpdateRoomRequest;
use App\Models\Theater;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rooms = Room::with('theater')->get(); // Eager load theater data
        return view('admin.rooms.index', compact('rooms'))->with('title', 'Rooms');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $theaters = Theater::all();
        return view('admin.rooms.create', compact('theaters'))
            ->with('title', 'Create Room');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $room = $request->validate([
            'room_name' => 'required|string|max:255',
            'quantity' => 'required|integer|min:1|max:900',
            'screen_name' => 'required|string|max:255',
            'theater_id' => 'required|integer|exists:theaters,id',
        ]);

        Room::create($room);
        return redirect()->route('admin.rooms.index')
            ->with('success', 'Room created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Room $room)
    {
        $room->load('theater'); // Eager load theater data
        return view('admin.rooms.show', compact('room'))
            ->with('title', 'Room Details');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Room $room)
    {
        $room->load('theater'); // Eager load theater data
        $theaters = Theater::all();
        return view('admin.rooms.edit', compact('room', 'theaters'))
            ->with('title', 'Edit Room');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Room $room)
    {
        $validateData = $request->validate([
            'room_name' => 'required|string|max:255',
            'quantity' => 'required|integer|min:1|max:900',
            'screen_name' => 'required|string|max:255',
            'theater_id' => 'required|integer|exists:theaters,id',
        ]);

        $room->update($validateData);
        return redirect()->route('admin.rooms.index')
            ->with('success', 'Screen updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Room $room)
    {
        $room->delete();
        return redirect()->route('admin.rooms.index')
            ->with('success', 'Screen deleted successfully!');
    }
}
