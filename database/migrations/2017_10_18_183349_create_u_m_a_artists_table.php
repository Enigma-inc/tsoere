<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUMAArtistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('uma_artists', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('song')->nullable();
            $table->string('avatar')->default('images/uma-logo.png');
            $table->string('sms_code');
            $table->string('video_code')->nullable();
            $table->unsignedInteger('category_id');
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
        Schema::dropIfExists('u_m_a_artists');
    }
}
