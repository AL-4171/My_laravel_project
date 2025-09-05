<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $primaryKey = 'TagID';
    public $timestamps = false;

    protected $fillable = ['Name'];

    public function posts()
    {
        return $this->belongsToMany(Post::class, 'posts_tags', 'TagID', 'PostID');
    }
}