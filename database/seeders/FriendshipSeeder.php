<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Friendship;
use App\Models\User;

class FriendshipSeeder extends Seeder {
    public function run(){
        $users = User::all();
        foreach($users as $u){
            $other = $users->where('id','!=',$u->id)->random(1)->first();
            Friendship::firstOrCreate(['requester_id'=>$u->id,'addressee_id'=>$other->id],['status'=>'accepted']);
        }
    }
}
