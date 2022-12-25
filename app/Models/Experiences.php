<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use ESolution\DBEncryption\Traits\EncryptedAttribute;

class Experiences extends Model
{
    use HasFactory;
    use EncryptedAttribute;
    protected $fillable=[
        'exp_title','company_name','exp_from',
        'exp_to','user_id'
    ];

    protected $encryptable=[
        'exp_title','company_name'
    ];
}
