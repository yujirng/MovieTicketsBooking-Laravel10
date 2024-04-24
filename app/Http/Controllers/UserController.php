<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // if (Auth::user()->hasRole('admin')) {
        $users = User::all();
        return view('users.index', compact('users'));
        // }

        return abort(403, 'Unauthorized');
    }

    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'username' => 'required|string|min:3|max:30|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'phone' => 'required|string|min:10|max:15|unique:users',
            'birthday' => 'required|date',
            'image' => 'nullable|string|max:100',
            'gender' => 'required|boolean',
        ]);

        if ($validator->fails()) {
            return redirect()->route('users.create')
                ->withErrors($validator)
                ->withInput();
        }

        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
            'birthday' => $request->birthday,
            'image' => $request->image,
            'gender' => $request->gender,
        ]);

        return redirect()->route('users.index')->with('success', 'User created successfully!');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);

        // Check if the current user has permission to edit this user
        // if (!Auth::user()->can('edit-user', $user)) {
        //     return abort(403, 'Unauthorized');
        // }

        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        // Check if the current user has permission to edit this user
        // if (!Auth::user()->can('edit-user', $user)) {
        //     return abort(403, 'Unauthorized');
        // }

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'username' => 'required|string|min:3|max:30|unique:users,id,' . $id, // Exclude current ID from unique check
            'email' => 'required|string|email|max:255|unique:users,email,' . $id, // Exclude current ID from unique check
            'phone' => 'required|string|min:10|max:15|unique:users,phone,' . $id, // Exclude current ID from unique check
            'birthday' => 'required|date',
            'image' => 'nullable|string|max:100',
            'gender' => 'required|boolean',
        ]);

        if ($validator->fails()) {
            return redirect()->route('users.edit', $id)
                ->withErrors($validator)
                ->withInput();
        }

        $user->update([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Update password if changed
            'phone' => $request->phone,
            'birthday' => $request->birthday,
            'image' => $request->image,
            'gender' => $request->gender,
        ]);

        return redirect()->route('users.index')->with('success', 'User updated successfully!');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);

        // // Check if the current user has permission to delete this user
        // if (!Auth::user()->can('delete-user', $user)) {
        //     return abort(403, 'Unauthorized');
        // }

        $user->delete();

        return redirect()->route('users.index')->with('success', 'User deleted successfully!');
    }
}
