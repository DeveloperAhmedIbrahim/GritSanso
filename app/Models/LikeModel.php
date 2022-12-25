<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LikeModel extends Model
{
    use HasFactory;
    protected $table='likes';

    protected $fillable=[
        'liked_by',
        'liked'
    ];

    function getLikedBy(){
        return User::find($this->liked_by);
    }
    function getLiked(){
        return User::find($this->liked);
    }
}
