<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use ESolution\DBEncryption\Traits\EncryptedAttribute;
class TransactionModel extends Model
{
    use HasFactory;
    use EncryptedAttribute;
    protected $table="transactions";

    protected $fillable=[
        'description','txid','amount','servceFees','status','payment_gateway_id','sanso_wallet_id'
    ];
    protected $encryptable=[
        'email'
    ];

    function getPaymentGateway(){
        return PaymentGatewayModel::find($this->payment_gateway_id);

    }

    function getSansoWallet(){
        return SansoWalletModel::find($this->sanso_wallet_id);
    }

    function getUser(){
        return User::find($this->getSansoWallet()->user_id);
    }

    function getTransaction(){
    
        return $this->belongsTo(SansoWalletModel::class,'sanso_wallet_id');

    }
    

    function getSanso(){

    }
}
