<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCategoryColumnToArtistTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('artists', function (Blueprint $table) {
            $table->unsignedInteger('artist_category_id')
                  ->after('about');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        
        //Remove Artist Categroy foreign key from Artist table
        if (Schema::hasColumn('artists', 'artist_category_id')) {
                 Schema::table('artists', function (Blueprint $table) {
           $table->dropColumn('artist_category_id');
            
        });
        }
    }
}
