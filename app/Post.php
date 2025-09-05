<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $primaryKey = 'PostID';
    public $timestamps = false;

    protected $fillable = ['Title','Body','UserID','CreatedAt'];

    public function user()
    {
        return $this->belongsTo(User::class, 'UserID');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'posts_categories', 'PostID', 'CategoryID');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'posts_tags', 'PostID', 'TagID');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'PostID');
    }
}