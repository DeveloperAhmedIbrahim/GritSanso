<?php

use App\Enums\ActionEnums;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoachService extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coach_service', function (Blueprint $table) {
            $table->id();
            $table->double('service_charges');
            $table->string('service_title');
            $table->integer('service_status')->default(0);
            $table->integer('service_sessions')->default(1);
            $table->unsignedBigInteger('service_category_id')->constraint('service_categories');
            $table->unsignedBigInteger('user_id')->constraint('users');
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
        Schema::dropIfExists('coach_service');
    }
}
