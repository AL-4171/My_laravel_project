<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $primaryKey = 'CategoryID';
    public $timestamps = false;

    protected $fillable = ['Name','Description'];

    public function posts()
    {
        return $this->belongsToMany(Post::class, 'posts_categories', 'CategoryID', 'PostID');
    }
}