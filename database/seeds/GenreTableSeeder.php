<?php

use Illuminate\Database\Seeder;
use App\Genre;

class GenreTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         Genre::create([
            'name' => 'Hip Hop',
            'slug' => str_slug('Hip Hop')
        ]);
        Genre::create([
            'name' => 'Poetry',
            'slug' => str_slug('Poetry')
        ]);

        Genre::create([
            'name' => 'Afro Jazz',
            'slug' => str_slug('Afro Jazz')
        ]);
        Genre::create([
            'name' => 'Reggae',
            'slug' => str_slug('Reggae')
        ]);
    }
}
