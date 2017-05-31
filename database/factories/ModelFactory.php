<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'is_admin' => $faker -> boolean,  
        'remember_token' => str_random(10),
    ];
});

$factory ->define(App\Artist::class, function ($faker){
    $artistName= $faker -> name;

    return [
        'user_id' => function(){
            return factory('App\User') -> create()->id;
        },
        'name' => $artistName,
        'avatar'=> $faker -> sentence,
        'slug' =>  str_slug($artistName),
        'about'=>$faker -> paragraph 

    ];

});

