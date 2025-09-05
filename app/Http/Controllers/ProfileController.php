<?php
namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\ProfileRequest;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller {
    public function show($id){
        $user = User::with('posts')->findOrFail($id);
        return view('profile.show', compact('user'));
    }

    public function edit($id){
        if(Auth::id() != $id && !Auth::user()->isAdmin()) abort(403);
        $user = User::findOrFail($id);
        return view('profile.edit', compact('user'));
    }

    public function update(ProfileRequest $r, $id){
        if(Auth::id() != $id && !Auth::user()->isAdmin()) abort(403);
        $user = User::findOrFail($id);
        $data = $r->only(['name','bio']);
        if($r->hasFile('avatar')){
            $path = $r->file('avatar')->store('avatars','public');
            $data['avatar'] = $path;
        }
        $user->update($data);
        return redirect()->route('profile.show',$user->id)->with('status','Profile updated');
    }
}
