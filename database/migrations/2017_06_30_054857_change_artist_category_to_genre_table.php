<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeArtistCategoryToGenreTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Remove Artist Categroy foreign key from Artist table
        if (Schema::hasColumn('artists', 'artist_category_id')) {
                 Schema::table('artists', function (Blueprint $table) {
           $table->dropColumn('artist_category_id');
            
        });
        }
    
        // Remove Artist Categories table
        Schema::dropIfExists('artist_categories');

        //Add Genre foreign key to Artist

        Schema::table('artists', function (Blueprint $table) {
            $table->unsignedInteger('genre_id')
             ->after('slug');;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
            if (Schema::hasColumn('artists', 'genre_id')) {
                 Schema::table('artists', function (Blueprint $table) {
           $table->dropColumn('genre_id');
            
        });
        }
    }
}
