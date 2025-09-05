<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;

class CommentSeeder extends Seeder {
    public function run(){
        $posts = Post::all();
        $users = User::all();
        foreach ($posts as $post) {
            // attach 0-3 comments
            $count = rand(0,3);
            for ($i=0;$i<$count;$i++){
                Comment::create([
                    'post_id' => $post->id,
                    'user_id' => $users->random()->id,
                    'body' => 'Sample comment on post #' . $post->id,
                ]);
            }
        }
    }
}
