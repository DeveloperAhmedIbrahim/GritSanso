<?php

use App\Enums\ActionEnums;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string('description');
            $table->string('txid')->unique();
            $table->double('amount');
            $table->double('servceFees')->default(0.0);
            $table->integer('status')->default(0); //use enums
            $table->unsignedBigInteger('payment_gateway_id')->constraint('payment_gateways');
            $table->unsignedBigInteger('sanso_wallet_id')->constraint('sanso_wallets');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
}
