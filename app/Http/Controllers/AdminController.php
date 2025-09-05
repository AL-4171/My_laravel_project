<?php
namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Post;
use Illuminate\Http\Request;

class AdminController extends Controller {
    public function __construct(){ $this->middleware('admin'); }
    public function dashboard(){
        $users = User::orderBy('created_at','desc')->paginate(20);
        $posts = Post::orderBy('created_at','desc')->paginate(20);
        return view('admin.dashboard', compact('users','posts'));
    }
    public function deletePost($id){ Post::findOrFail($id)->delete(); return redirect()->back()->with('status','Post deleted'); }
    public function toggleAdmin($id){
        $u = User::findOrFail($id); $u->is_admin = !$u->is_admin; $u->save(); return redirect()->back();
    }
}
