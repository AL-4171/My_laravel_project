<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $primaryKey = 'ProfileID';

    protected $fillable = ['UserID','Bio'];

    public function user()
    {
        return $this->belongsTo(User::class, 'UserID');
    }
}