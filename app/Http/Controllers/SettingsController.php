<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SettingsController extends Controller {
    public function __construct(){ $this->middleware('auth'); }
    public function edit(){ return view('settings.edit'); }
    public function update(Request $r){
        $user = Auth::user();
        $data = $r->validate(['email'=>'required|email|unique:users,email,'.$user->id,'password'=>'nullable|min:6']);
        $user->email = $data['email'];
        if(!empty($data['password'])) $user->password = Hash::make($data['password']);
        $user->save();
        return back()->with('status','Settings updated');
    }
}
