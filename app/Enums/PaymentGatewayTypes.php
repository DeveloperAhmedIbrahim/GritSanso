<?php 

 namespace App\Enums;

 //These are two categories for payment gateways.
 enum PaymentGatewayTypes:string{
    case Local="Local";
    case Global="Global";
 }