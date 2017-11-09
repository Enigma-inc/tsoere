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
            'slug' => str_slug('Hip Hop'),
            'order' => 1
        ]);
        
        Genre::create([
            'name' => 'Afro Jazz',
            'slug' => str_slug('Afro Jazz')
            ]);
        Genre::create([
            'name' => 'Afro-Pop',
            'slug' => str_slug('Afro Pop')
            ]);
        Genre::create([
            'name' => 'Dance',
            'slug' => str_slug('Dance')
            ]);
        Genre::create([
            'name' => 'Urban Contemporary',
            'slug' => str_slug('Urban Contemporary')
            ]);
        Genre::create([
            'name' => 'Kwaito',
            'slug' => str_slug('Kwaito')
            ]);
        Genre::create([
            'name' => 'Gospel',
            'slug' => str_slug('Gospel')
            ]);
        Genre::create([
            'name' => 'Reggae',
            'slug' => str_slug('Reggae')
            ]);
        Genre::create([
            'name' => 'Famo',
            'slug' => str_slug('Famo')
            ]);
        Genre::create([
            'name' => 'Poetry',
            'slug' => str_slug('Poetry')
        ]);
    }
}
