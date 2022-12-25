<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sitelog extends Model
{
    use HasFactory;


  protected $table='sitelogs';
  protected $fillable=[
    'type','session_id','login','logout','user_id'
  ];
}
