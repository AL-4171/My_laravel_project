<?php
namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable {
    use Notifiable, HasFactory;
    protected $fillable = ['name','email','password','avatar','bio','is_admin'];
    protected $hidden = ['password','remember_token'];
    protected $casts = ['is_admin' => 'boolean'];

    public function posts(): HasMany { return $this->hasMany(Post::class); }
    public function comments(): HasMany { return $this->hasMany(Comment::class); }
    public function likes(): HasMany { return $this->hasMany(\App\Models\Like::class); }

    public function isAdmin(): bool { return (bool) $this->is_admin; }
}
