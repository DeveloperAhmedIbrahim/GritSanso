<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class PaymentGateways extends Enum
{
 

    const Card="Credit/Debit Card";
    const PayPal="PayPal";
    const EasyPaisa="Eaisy Paisa";
    const JazzCash="Jazz Cash";
    const Payoneer="Payoneer";
    const OmniCash="Omni Cash";
    const SansoPay="Sanso Pay";
    const TransferWise="Transfer Wise";
}
