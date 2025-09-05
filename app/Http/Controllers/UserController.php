<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ProfileRequest;

class UserController extends Controller {
    public function __construct(){ $this->middleware('auth')->except(['index','show']); }

    public function index(Request $r){
        $q = $r->get('q');
        $users = User::when($q, function($qry) use ($q){ return $qry->where('name','like','%'.$q.'%')->orWhere('email','like','%'.$q.'%'); })->paginate(20);
        return view('users.index', compact('users','q'));
    }

    public function create(){ $this->authorize('admin'); return view('users.create'); }

    public function store(Request $r){
        $this->authorize('admin');
        $data = $r->validate(['name'=>'required','email'=>'required|email|unique:users','password'=>'required|min:6']);
        $data['password'] = Hash::make($r->password);
        User::create($data);
        return redirect()->route('users.index')->with('status','User created');
    }

    public function show($id){
        $user = User::with('posts','comments')->findOrFail($id);
        return view('users.show', compact('user'));
    }

    public function edit($id){
        if(Auth::id() != $id && !Auth::user()->isAdmin()) abort(403);
        $user = User::findOrFail($id);
        return view('users.edit', compact('user'));
    }

    public function update(ProfileRequest $r, $id){
        if(Auth::id() != $id && !Auth::user()->isAdmin()) abort(403);
        $user = User::findOrFail($id);
        $data = $r->only(['name','bio']);
        if($r->hasFile('avatar')) $data['avatar'] = $r->file('avatar')->store('avatars','public');
        $user->update($data);
        return redirect()->route('users.show',$user->id)->with('status','User updated');
    }

    public function destroy($id){
        $user = User::findOrFail($id);
        if(Auth::id() != $user->id && !Auth::user()->isAdmin()) abort(403);
        $user->delete();
        return redirect()->route('users.index')->with('status','User deleted');
    }
}
