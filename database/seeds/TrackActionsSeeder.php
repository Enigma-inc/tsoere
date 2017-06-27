<?php

use Illuminate\Database\Seeder;
use App\Action;

class TrackActionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Action::create([
            'name' => 'download',
        ]);
        Action::create([
            'name' => 'played',
        ]);
        Action::create([
            'name' => 'share',
        ]);
    }
}
