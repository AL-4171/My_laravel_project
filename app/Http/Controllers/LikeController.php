<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Like;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller {
    public function __construct(){ $this->middleware('auth'); }

    public function index(){
        $likes = Like::with('user')->latest()->paginate(30);
        return view('likes.index', compact('likes'));
    }

    public function store(Request $r, $postId){
        $post = Post::findOrFail($postId);
        $exists = Like::where(['user_id'=>Auth::id(),'likeable_id'=>$post->id,'likeable_type'=>Post::class])->first();
        if(!$exists){
            Like::create(['user_id'=>Auth::id(),'likeable_id'=>$post->id,'likeable_type'=>Post::class]);
        }
        return redirect()->back();
    }

    public function destroy($id){
        $like = Like::findOrFail($id);
        if($like->user_id != Auth::id() && !Auth::user()->isAdmin()) abort(403);
        $like->delete();
        return redirect()->back();
    }
}
