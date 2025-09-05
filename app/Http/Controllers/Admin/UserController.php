<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'Name'=>'required|string|max:100',
            'Email'=>'required|email|unique:users,Email',
            'pass'=>'required|string|min:4',
            'Role'=>'required|in:user,admin'
        ]);

        User::create([
            'Name'=>$request->Name,
            'Email'=>$request->Email,
            'pass'=>Hash::make($request->pass),
            'Role'=>$request->Role
        ]);

        return redirect()->route('users.index')->with('success','User created.');
    }

    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'Name'=>'required|string|max:100',
            'Email'=>"required|email|unique:users,Email,{$user->UserID},UserID",
            'Role'=>'required|in:user,admin'
        ]);

        $data = [
            'Name' => $request->Name,
            'Email' => $request->Email,
            'Role' => $request->Role
        ];

        if ($request->filled('pass')) {
            $data['pass'] = Hash::make($request->pass);
        }

        $user->update($data);

        return redirect()->route('users.index')->with('success','User updated.');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success','User deleted.');
    }
}