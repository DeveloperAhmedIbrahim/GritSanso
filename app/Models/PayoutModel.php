<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use ESolution\DBEncryption\Traits\EncryptedAttribute;

class PayoutModel extends Model
{
    use EncryptedAttribute;
    use HasFactory;

    protected $table = 'payouts';

    protected $fillable = [
        'transaction_id', 'card_id', 'sanso_wallet_id', 'clearance', 'status',
    ];

    protected $encryptable = [
         'status',
    ];

    function getWallet()
    {
        return SansoWalletModel::find($this->sanso_wallet_id);
    }

    function getCard()
    {
        return CardModel::find($this->card_id);
    }
    function getTransaction()
    {
        return TransactionModel::find($this->transaction_id);
    }
}
