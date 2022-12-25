<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserNotifications extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_notifications', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('body');
            $table->unsignedBigInteger("send_to")->constraint('users')->nullable();
            $table->unsignedBigInteger("send_from")->constraint('users')->nullable();
            $table->unsignedBigInteger("send_from_admin")->constraint('admins')->nullable();
            $table->string('topic')->nullable();
            $table->string('status')->default("delivered");
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
        Schema::dropIfExists('user_notifications');
    }
}
