<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class user_notifications extends Model
{
 
  
    use HasFactory;
  
    protected $table='user_notifications';

    protected $fillable=[
        'id','title','body','send_to','send_from','send_from_admin','topic','status'
    ];
  
  
  
	function getSendFrom(){
        return User::find($this->send_from);
    }
  
  
}
