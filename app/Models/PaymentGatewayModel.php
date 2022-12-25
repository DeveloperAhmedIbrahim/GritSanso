<?php

namespace App\Models;

//use App\Enums\PaymentGateways;
//use App\Enums\PaymentGatewayTypes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentGatewayModel extends Model
{
    use HasFactory;
    protected $table="payment_gateways";

    protected $fillable=[
        'gateway','gateway_type','gateway_status'
    ];

    protected $casts=[
     //   'gateway'=>PaymentGateways::class,
     //   'gateway_type'=>PaymentGatewayTypes::class
    ];
}
