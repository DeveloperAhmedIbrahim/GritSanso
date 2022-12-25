<?php

namespace App\Models;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;

class Admin extends Model implements Authenticatable
{
    use HasFactory;
    use AuthenticableTrait;

    protected $guard = 'admin';

    protected $fillable=['name' , 'email' , 'password' , 'country' , 'phone_number' , 'profile_picture'];
}
