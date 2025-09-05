<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $primaryKey = 'UserID';

    protected $fillable = [
        'Name', 'Email', 'pass', 'Age', 'Phone', 'Role'
    ];

    protected $hidden = [
        'pass', 'remember_token'
    ];

    public function getAuthPassword()
    {
        return $this->pass;
    }

    public function posts()
    {
        return $this->hasMany(Post::class, 'UserID');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'UserID');
    }

    public function profile()
    {
        return $this->hasOne(Profile::class, 'UserID');
    }
}