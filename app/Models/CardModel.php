<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use ESolution\DBEncryption\Traits\EncryptedAttribute;

class CardModel extends Model
{
    use EncryptedAttribute;
    use HasFactory;

    protected $table = 'cards';

    protected $fillable = [
        'holder', 'number', 'expiry', 'cvc', 'card_type', 'user_id'
    ];

    protected $encryptable = [
        'holder', 'number', 'expiry', 'cvc', 'card_type'
    ];

    function getUser()
    {
        return User::find($this->user_id);
    }
}
