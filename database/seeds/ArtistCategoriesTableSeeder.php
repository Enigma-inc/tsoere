<?php

use Illuminate\Database\Seeder;
use App\ArtistCategory;

class ArtistCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         ArtistCategory::create([
            'name' => 'Hip Hop'
        ]);
        ArtistCategory::create([
            'name' => 'Poetry'
        ]);

        ArtistCategory::create([
            'name' => 'Afro Jazz'
        ]);
        ArtistCategory::create([
            'name' => 'Reggae'
        ]);
    }
}
