<?php

namespace Database\Seeders;

use App\Enums\PaymentGateways;
use App\Enums\PaymentGatewayTypes;
use App\Models\PaymentGatewayModel;
use Illuminate\Database\Seeder;

class PaymentGatewaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        foreach (PaymentGateways::const() as $gateway) {
            if ($gateway == PaymentGateways::EasyPaisa || $gateway == PaymentGateways::JazzCash || $gateway == PaymentGateways::OmniCash) {
                PaymentGatewayModel::create([
                    'gateway' => $gateway, 'gateway_type' => PaymentGatewayTypes::Local
                ]);
            } else {
                PaymentGatewayModel::create([
                    'gateway' => $gateway, 'gateway_type' => PaymentGatewayTypes::Global
                ]);
            }
        }
    }
}
