<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMediaFiles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('media_files', function (Blueprint $table) {
            $table->id();
            $table->string('attachment');
            $table->string("attachment_type");
            $table->unsignedBigInteger('coach_service_id')->nullable()->constraint('coach_service');
            $table->boolean('sharable')->default(false);
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
        Schema::dropIfExists('media_files');
    }
}
