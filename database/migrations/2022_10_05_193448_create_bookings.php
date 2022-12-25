<?php

use App\Enums\ActionEnums;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->integer('status')->default(0);
            $table->unsignedBigInteger('coachee_id')->constraint('users');
            $table->unsignedBigInteger('coach_id')->constraint('users');
            $table->unsignedBigInteger('coach_service_id')->constraint('coach_service');
            $table->unsignedBigInteger("transaction_id")->constraint('transactions');
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
        Schema::dropIfExists('bookings');
    }
}
