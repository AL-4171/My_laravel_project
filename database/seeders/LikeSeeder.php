<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Like;
use App\Models\Post;
use App\Models\User;

class LikeSeeder extends Seeder {
    public function run(){
        $posts = Post::all(); $users = User::all();
        foreach($posts as $p){
            $count = rand(0,5);
            for($i=0;$i<$count;$i++){
                $u = $users->random();
                Like::firstOrCreate(['user_id'=>$u->id,'likeable_id'=>$p->id,'likeable_type'=>\App\Models\Post::class]);
            }
        }
    }
}
