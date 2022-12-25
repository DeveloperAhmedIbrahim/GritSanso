<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWebSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('web_settings', function (Blueprint $table) {
            $table->id();
            $table->longText('dashboard_icon')->nullable();
            $table->longText('dashboard_fav_icon')->nullable();
            $table->string('name')->nullable();
            $table->string('ServiceFee')->nullable();
            $table->string('DefaultCurrency')->nullable();
            $table->string('SiteTitle')->nullable();
            $table->string('CurrencySign')->nullable();
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
        Schema::dropIfExists('web_settings');
    }
}
