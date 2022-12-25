<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use ESolution\DBEncryption\Traits\EncryptedAttribute;
class PaymentCardModel extends Model
{
    use HasFactory;
    use EncryptedAttribute;
    protected $table='payment_cards';

    protected $fillable=[
        'card_number','card_exp','card_cvc','name_on_card','card_type',
        'payment_gateway_id','user_id'
    ];

    protected $encryptable=[
        'card_number','card_exp','card_cvc','name_on_card','card_type'
    ];

    function getUser(){
        return User::find($this->user_id);
    }
    function getPaymentGateway(){
        return PaymentGatewayModel::find($this->payment_gateway_id);
    }
}
