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
            'name' => 'Hip Hop'
        ]);
        Genre::create([
            'name' => 'Poetry'
        ]);

        Genre::create([
            'name' => 'Afro Jazz'
        ]);
        Genre::create([
            'name' => 'Reggae'
        ]);
    }
}
