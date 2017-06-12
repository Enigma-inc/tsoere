<?php

use App\User;
use App\Artist;
use App\Track;

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(User::class, function (Faker\Generator $faker) {
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

    $factory->define(App\Genre::class,function($faker){
        return [
            'name'=>$faker->name
        ];
    });
    $factory->define(App\Genre::class,function($faker){
        return [
            'name'=>$faker->name
        ];
    });

