<?php

namespace App\Http\Controllers;

use App\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Show the logged-in user's profile.
     */
    public function myProfile()
    {
        $user = Auth::user();
        $profile = $user->profile;

        if (!$profile) {
            $profile = Profile::create([
                'UserID' => $user->UserID,
                'Bio' => '',
            ]);
        }

        return view('profiles.show', compact('user', 'profile'));
    }

    /**
     * Show edit form for the logged-in user's profile (user info + bio).
     */
    public function edit()
    {
        $user = Auth::user();
        $profile = $user->profile;

        if (!$profile) {
            $profile = Profile::create([
                'UserID' => $user->UserID,
                'Bio' => '',
            ]);
        }

        return view('profiles.edit', compact('user', 'profile'));
    }

    /**
     * Update the logged-in user's profile (users + profiles tables).
     */
    public function update(Request $request)
    {
        $user = Auth::user();
        $profile = $user->profile;

        $request->validate([
            'Name' => 'required|string|max:255',
            'Email' => 'required|email|unique:users,Email,' . $user->UserID . ',UserID',
            'Age' => 'nullable|integer|min:1|max:120',
            'Phone' => 'nullable|string|max:20',
            'Bio' => 'nullable|string|max:255',
        ]);

        // update users table
        $user->update([
            'Name' => $request->input('Name'),
            'Email' => $request->input('Email'),
            'Age' => $request->input('Age'),
            'Phone' => $request->input('Phone'),
        ]);

        // update profiles table
        $profile->update([
            'Bio' => $request->input('Bio'),
        ]);

        return redirect()->route('profiles.my')
            ->with('success', 'Profile updated successfully.');
    }
}