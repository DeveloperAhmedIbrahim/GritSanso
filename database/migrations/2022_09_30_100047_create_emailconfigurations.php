<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmailconfigurations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emailconfigurations', function (Blueprint $table) {
            $table->id();
            $table->string('email_from');
            $table->string('email_name');
            $table->string('smtp_host');
            $table->string('smtp_port');
            $table->string('smtp_encryption');
            $table->string('username');
            $table->string('password');
            $table->string('description')->nullable();
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
        Schema::dropIfExists('emailconfigurations');
    }
}
