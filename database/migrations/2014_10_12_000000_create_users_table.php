<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
              $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->unsignedBigInteger('country')->nullable()->constraint('countries');
            $table->string('phone_number')->nullable();
            $table->string('country_id')->nullable();
            $table->string('passport_id')->nullable();
            $table->longText('profile_picture')->nullable();
            $table->string('linkedin_link')->nullable()->unique();
            $table->string('type');
            $table->string('gender')->nullable();
            $table->longText('about')->nullable();
            $table->boolean('account_status')->default(1);
            $table->string('fluent_in')->nullable();
            $table->string('fcm_token')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
