<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Friendship;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class FriendshipController extends Controller {
    public function __construct(){ $this->middleware('auth'); }

    public function index(){
        $u = Auth::user();
        $sent = Friendship::where('requester_id',$u->id)->paginate(20);
        $received = Friendship::where('addressee_id',$u->id)->paginate(20);
        return view('friends.index', compact('sent','received'));
    }

    public function store(Request $r, $addresseeId){
        $addressee = User::findOrFail($addresseeId);
        if($addressee->id == Auth::id()) return back();
        $exists = Friendship::where(['requester_id'=>Auth::id(),'addressee_id'=>$addressee->id])->first();
        if(!$exists){
            Friendship::create(['requester_id'=>Auth::id(),'addressee_id'=>$addressee->id,'status'=>'pending']);
        }
        return back()->with('status','Request sent');
    }

    public function accept($id){
        $f = Friendship::findOrFail($id);
        if($f->addressee_id != Auth::id() && !Auth::user()->isAdmin()) abort(403);
        $f->status = 'accepted'; $f->save();
        return back()->with('status','Friend request accepted');
    }

    public function reject($id){
        $f = Friendship::findOrFail($id);
        if($f->addressee_id != Auth::id() && !Auth::user()->isAdmin()) abort(403);
        $f->status = 'blocked'; $f->save();
        return back()->with('status','Friend request rejected');
    }

    public function destroy($id){
        $f = Friendship::findOrFail($id);
        if($f->requester_id != Auth::id() && $f->addressee_id != Auth::id() && !Auth::user()->isAdmin()) abort(403);
        $f->delete();
        return back()->with('status','Friendship removed');
    }
}
