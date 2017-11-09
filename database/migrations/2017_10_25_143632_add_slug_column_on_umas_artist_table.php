<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSlugColumnOnUmasArtistTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('uma_artists',function (Blueprint $table)
        {
            $table->string('slug')->unique()
                  ->after('category_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('uma_artists',function (Blueprint $table)
        {
            $table->dropColumn('slug');
        });
    }
}
