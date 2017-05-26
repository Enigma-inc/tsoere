<?php



Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/artist/{slug}', [
    'uses'=>'ArtistController@index',
    'as'=>'artist.home'
]);

Route::group(['middleware'=>'auth'],function(){


    Route::get('/profile', [
        'uses'=>'ProfileController@index',
        'as'=>'profile'
    ]);

    Route::get('/profile/edit', [
        'uses'=>'ArtistController@edit',
        'as'=>'profile.edit'
    ]);
    
});
