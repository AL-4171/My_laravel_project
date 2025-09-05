<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    public function destroy()
    {
        $user = Auth::user();
        Auth::logout();
        $user->delete();
        return redirect()->route('home');
    }
}