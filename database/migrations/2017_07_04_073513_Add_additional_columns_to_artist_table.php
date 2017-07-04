<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAdditionalColumnsToArtistTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::table('artists', function (Blueprint $table) {
            $table->string('booking_phone')
                  ->after('about')
                  ->nullable();       
            $table->string('booking_email')
                  ->after('about')
                  ->nullable();
            $table->string('facebook')
                  ->after('about')
                  ->nullable();
            $table->string('instagram')
                  ->after('about')
                  ->nullable();
            $table->string('twitter')
                  ->after('about')
                  ->nullable();
            $table->text('affiliations')
                  ->after('about')
                  ->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
         Schema::table('artists', function (Blueprint $table) {
            $table->dropColumn('booking_phone');
            $table->dropColumn('booking_email');
            $table->dropColumn('facebook');
            $table->dropColumn('instagram');
            $table->dropColumn('twitter');
            $table->dropColumn('affiliations');            
        });
    }
}
