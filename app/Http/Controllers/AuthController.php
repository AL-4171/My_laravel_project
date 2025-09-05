<?php
namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller {
    public function showRegister(){ return view('auth.register'); }
    public function register(Request $r){
        $r->validate(['name'=>'required','email'=>'required|email|unique:users','password'=>'required|min:6']);
        $user = User::create(['name'=>$r->name,'email'=>$r->email,'password'=>Hash::make($r->password)]);
        Auth::login($user);
        return redirect('/');
    }
    public function showLogin(){ return view('auth.login'); }
    public function login(Request $r){
        $credentials = $r->only('email','password');
        if(Auth::attempt($credentials)){ return redirect('/'); }
        return back()->withErrors(['email'=>'Invalid credentials']);
    }
    public function logout(){ Auth::logout(); return redirect('/login'); }
}
