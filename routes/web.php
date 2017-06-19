<?php



Auth::routes();

Route::get('/', [
    'uses'=>'HomeController@index',
    'as'=>'home'
]);

//Artist Public Page
Route::get('/artist/{slug}', [
    'uses'=>'ArtistController@index',
    'as'=>'artist.home'
]);

//Single Track Public Page
Route::get('/artist/{artistSlug}/single/{trackSlug}', [
    'uses'=>'ArtistController@singleTrack',
    'as'=>'track.single'
]);
 
//Record Track Play
 Route::get('played/{track}', [
        'uses'=>'TrackController@recordTrackPlay',
        'as'=>'track.play'
    ]);
//Downlaod Track Route 
 Route::get('download/{track}', [
        'uses'=>'TrackController@download',
        'as'=>'track.download'
    ]);
 //genre pages route
Route::get('/category/{genre}',[
    'uses'=>'TrackController@displayCategory',
    'as' =>'track.category'
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
    Route::get('/tracks/upload', [
        'uses'=>'TrackController@create',
        'as'=>'track.create'
    ]);
    Route::post('/tracks/{artistId}', [
        'uses'=>'TrackController@store',
        'as'=>'track.store'
    ]);

    
    Route::get('/update-avatar/artist',[
        'uses' => 'ArtistController@update',
        'as' => 'artist.avatar-update'
    ]);

    Route::post('/update-avatar/{profile}','ArtistController@upload_avatar');

    });

