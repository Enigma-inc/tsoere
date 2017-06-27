<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddListenDownloadsLikesColumnToTrackTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tracks', function (Blueprint $table) {
            $table->integer('downloads')
                   ->default(0)
                   ->after('genre_id');
            $table->integer('played')
                   ->default(0)
                   ->after('genre_id');
            $table->integer('likes')
                   ->default(0)
                   ->after('genre_id');
     
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tracks', function (Blueprint $table) {
            
            $table->dropColumn('downloads');
            $table->dropColumn('played');
            $table->dropColumn('likes');
        });
    }
}
