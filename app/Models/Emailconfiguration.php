<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Emailconfiguration extends Model
{
    use HasFactory;
    protected $talble='emailconfigurations';

    protected $fillable=['email_from' , 'email_name' , 'smtp_host','smtp_port','smtp_encryption','username','password','description'];
    

}
