<?php

use App\User;
use App\Artist;

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(Artist::class,function(Faker\Generator $faker){

    $artistName=$faker->name;
    return [
        'user_id'=>function(){return factory(User::class)->create()->id;},
        'name'=>$artistName,
        'avatar'=>$faker->word,
        'slug'=>str_slug($artistName),
        'about'=>$faker->sentence

    ];
});


         