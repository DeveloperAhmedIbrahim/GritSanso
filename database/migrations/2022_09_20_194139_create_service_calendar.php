<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceCalendar extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_calendar', function (Blueprint $table) {
            $table->id();
            $table->date('session_date');
            $table->time('session_time');
            $table->unsignedBigInteger('session_recording_id')->constraint('media_files')->nullable();
            $table->integer('number_of_sessions')->nullable();
            $table->unsignedBigInteger('coach_service_id')->constraint('coach_service');
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
        Schema::dropIfExists('service_calendar');
    }
}
