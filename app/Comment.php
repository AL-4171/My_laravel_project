<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $primaryKey = 'CommentID';
    public $timestamps = false;

    protected $fillable = ['Body','UserID','PostID','CreatedAt'];

    public function post()
    {
        return $this->belongsTo(Post::class, 'PostID');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'UserID');
    }
}
