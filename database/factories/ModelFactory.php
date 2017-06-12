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

<<<<<<< HEAD
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
$factory->define(Track::class,function(Faker\Generator $faker){

    return [
        'title'=>$faker->sentence,
        'file_path'=>str_slug($faker->sentence),
        'artwork'=>str_slug($faker->sentence),
        'genre'=>$faker->word

    ];
});


         
=======

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

>>>>>>> d56d08636fcaaaa92c9e62c0d55be5ff544c59b1
