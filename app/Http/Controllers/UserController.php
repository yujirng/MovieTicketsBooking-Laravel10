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
        return view('admin.users.index', compact('users'))->with('title', "Users");;
        // }

        return abort(403, 'Unauthorized');
    }

    public function show(User $user)
    {
        return view('admin.users.show', compact('user'))->with('title', "User Details");;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create')->with('title', "Create User");;
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
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'phone' => 'required|string|min:10|max:15|unique:users',
            'birthday' => 'required|date',
            'image' => 'nullable|string|max:100',
            'gender' => 'required|boolean',
        ]);

        if ($validator->fails()) {
            return redirect()->route('admin.users.create')
                ->withErrors($validator)
                ->withInput();
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
            'birthday' => $request->birthday,
            'image' => $request->image,
            'gender' => $request->gender,
        ]);

        return redirect()->route('admin.users.index')->with('success', 'User created successfully!');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);

        // Check if the current user has permission to edit this user
        // if (!Auth::user()->can('edit-user', $user)) {
        //     return abort(403, 'Unauthorized');
        // }

        return view('admin.users.edit', compact('user'))->with('title', "Edit User");;
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
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'phone' => 'required|string|min:10|max:15|unique:users,phone,' . $id,
            'birthday' => 'required|date',
            'image' => 'nullable|string|max:100',
            'gender' => 'required|boolean',
        ]);

        if ($validator->fails()) {
            return redirect()->route('admin.users.edit', $id)
                ->withErrors($validator)
                ->withInput();
        }

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Update password if changed
            'phone' => $request->phone,
            'birthday' => $request->birthday,
            'image' => $request->image,
            'gender' => $request->gender,
        ]);

        return redirect()->route('admin.users.index')->with('success', 'User updated successfully!');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);

        // // Check if the current user has permission to delete this user
        // if (!Auth::user()->can('delete-user', $user)) {
        //     return abort(403, 'Unauthorized');
        // }

        $user->delete();

        return redirect()->route('admin.users.index')->with('success', 'User deleted successfully!');
    }
}
