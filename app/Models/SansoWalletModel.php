<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use ESolution\DBEncryption\Traits\EncryptedAttribute;

class SansoWalletModel extends Model
{
    use HasFactory;
    use EncryptedAttribute;
    protected $table = 'sanso_wallets';

    protected $fillable = [
        'firstName', 'lastName', 'email', 'password',
        'balance', 'user_id', 'wallet_status'
    ];

    protected $hidden = [
        'password',
    ];

   
    protected $encryptable = [
       'firstName','lastName', 'email', 'password',
    ];

    function getUser(){
        return User::find($this->user_id);
    }
   
}
