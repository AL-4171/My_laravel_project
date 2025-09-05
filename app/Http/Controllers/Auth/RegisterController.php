<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = '/';

    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:100|unique:users,Email',
            'password' => 'required|string|min:4|confirmed',
        ]);
    }

    protected function create(array $data)
    {
        return User::create([
            'Name' => $data['name'],
            'Email' => $data['email'],
            'pass' => Hash::make($data['password']),
            'Role' => 'user'
        ]);
    }

    protected function registered(Request $request, $user)
    {
        return redirect($this->redirectPath());
    }
}
