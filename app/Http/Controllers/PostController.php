<?php
namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\PostRequest;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller {
    public function __construct(){ $this->middleware('auth')->except(['index','show']); }

    public function index(){
        $posts = Post::with('user','comments.user')->orderBy('created_at','desc')->paginate(10);
        return view('feed.index', compact('posts'));
    }

    public function create(){ return view('posts.create'); }

    public function store(PostRequest $r){
        $data = $r->only(['content','privacy']);
        $data['user_id'] = Auth::id();
        if($r->hasFile('image')){
            $path = $r->file('image')->store('posts','public');
            $data['image'] = $path;
        }
        $post = Post::create($data);
        return redirect()->route('posts.show',$post->id)->with('status','Post created');
    }

    public function show($id){
        $post = Post::with('user','comments.user')->findOrFail($id);
        return view('posts.show', compact('post'));
    }

    public function edit($id){
        $post = Post::findOrFail($id);
        if(Auth::id() !== $post->user_id && !Auth::user()->isAdmin()) abort(403);
        return view('posts.edit', compact('post'));
    }

    public function update(PostRequest $r, $id){
        $post = Post::findOrFail($id);
        if(Auth::id() !== $post->user_id && !Auth::user()->isAdmin()) abort(403);
        $data = $r->only(['content','privacy']);
        if($r->hasFile('image')){ $path = $r->file('image')->store('posts','public'); $data['image'] = $path; }
        $post->update($data);
        return redirect()->route('posts.show',$post->id)->with('status','Post updated');
    }

    public function destroy($id){
        $post = Post::findOrFail($id);
        if(Auth::id() !== $post->user_id && !Auth::user()->isAdmin()) abort(403);
        $post->delete();
        return redirect()->route('home')->with('status','Post deleted');
    }
}
