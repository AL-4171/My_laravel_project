<?php
namespace App\Http\Controllers;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CommentRequest;

class CommentController extends Controller {
    public function __construct(){ $this->middleware('auth'); }

    public function store(CommentRequest $r, $postId){
        $post = Post::findOrFail($postId);
        $comment = Comment::create(['post_id'=>$post->id,'user_id'=>Auth::id(),'body'=>$r->body]);
        return redirect()->route('posts.show',$post->id)->with('status','Comment added');
    }

    public function edit($id){
        $c = Comment::findOrFail($id);
        if(Auth::id() !== $c->user_id && !Auth::user()->isAdmin()) abort(403);
        return view('comments.edit', compact('c'));
    }

    public function update(CommentRequest $r, $id){
        $c = Comment::findOrFail($id);
        if(Auth::id() !== $c->user_id && !Auth::user()->isAdmin()) abort(403);
        $c->update(['body'=>$r->body]);
        return redirect()->route('posts.show',$c->post_id)->with('status','Comment updated');
    }

    public function destroy($id){
        $c = Comment::findOrFail($id);
        if(Auth::id() !== $c->user_id && !Auth::user()->isAdmin()) abort(403);
        $pid = $c->post_id; $c->delete();
        return redirect()->route('posts.show',$pid)->with('status','Comment deleted');
    }
}
