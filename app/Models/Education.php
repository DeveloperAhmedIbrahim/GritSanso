<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use ESolution\DBEncryption\Traits\EncryptedAttribute;
class Education extends Model
{
    use HasFactory;
    use EncryptedAttribute;
    protected $table='education';

    protected $fillable=[
        'school_name','field_of_study','degree','from','to','user_id'
    ];

    protected $encryptable=[
        'school_name','field_of_study','degree'
    ];
}
