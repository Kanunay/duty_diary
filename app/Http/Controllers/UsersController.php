<?php

namespace App\Http\Controllers;

use App\Models\User; // Make sure to import the correct User model namespace
use Illuminate\Support\Facades\Hash;

use view;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

    // Pass the $users variable to your view
    return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        // Validate the form data
        $request->validate([
            'name' => 'nullable|string|max:255', // Make the 'name' field nullable in validation rules
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
            'role_id' => 'nullable|required|in:1,2,3',
        ]);
    
        // Provide a default value for the 'name' field if it's not provided in the form
        $name = $request->input('name', 'Default Name');
    
        // Create a new User instance with the form data
        $user = new User([
            'name' => $name,
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'role_id' => $request->input('role_id'),
        ]);
    
        // Save the user to the database
        $user->save();
    
        // Redirect to the index page or show a success message
        return redirect()->route('users.index')->with('success', 'User created successfully!');
    }
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
