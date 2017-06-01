<?php



Route::get('/', function () {
    return view('home.welcome');
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
    
    Route::get('/update-avatar',[
        'uses' => 'ArtistController@update',
        'as' => 'avatar.update'
    ]);

    Route::post('/update-avatar/{profile}','ArtistController@upload_avatar');

    });
