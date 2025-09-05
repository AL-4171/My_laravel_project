<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Notification;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller {
    public function __construct(){ $this->middleware('auth'); }

    public function index(){
        $notes = Notification::where('user_id', Auth::id())->orderBy('created_at','desc')->paginate(30);
        return view('notifications.index', compact('notes'));
    }

    public function markRead($id){
        $n = Notification::findOrFail($id);
        if($n->user_id != Auth::id()) abort(403);
        $n->read = true; $n->save();
        return back();
    }
}
