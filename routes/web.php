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
 //Record social media sharing
 Route::get('shared/{track}',[
     'uses' => 'TrackController@socialShared',
     'as' => 'track.share'
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
//Search Page
Route::get('/search', [
        'uses'=>'SearchController@index',
        'as'=>'search'
    ]);
 //genre pages route
Route::get('/category/{genre}',[
    'uses'=>'CategoryPageController@index',
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

    Route::post('/profile/additional-info/{artistId}',[
        'uses' => 'ProfileController@additionalInfo',
        'as' => 'profile.additionalinfo'
    ]);
    Route::get('/tracks/upload', [
        'uses'=>'TrackController@create',
        'as'=>'track.create'
    ]);
    Route::post('/tracks/{artistId}', [
        'uses'=>'TrackController@store',
        'as'=>'track.store'
    ]);
    //routes for updating track details
    Route::post('/tracks/artwork/{trackId}',[
        'uses' =>'TrackController@artworkUpdate',
        'as' =>'track.artwork.update'
    ]);

    Route::post('/tracks/title/{trackId}',[
         'uses' => 'TrackController@titleUpdate',
         'as' => 'track.title.update'
    ]);

    Route::get('/update-avatar/artist',[
        'uses' => 'ArtistController@update',
        'as' => 'artist.avatar-update'
    ]);

     Route::post('/tracks/{id}/trash', [
        'uses' => 'TrackController@trash',
        'as' => 'track.trash'
    ]);

    Route::post('/tracks/{id}/untrash',[
        'uses' => 'TrackController@untrash',
        'as' => 'track.untrash'
    ]);

    Route::post('tracks/{id}/disableDownloads',[
        'uses' => 'TrackController@downloadsDisable',
        'as'=>'downloads.disable'
    ]);
    Route::post('tracks/{id}/enableDownloads',[
        'uses' => 'TrackController@downloadsEnable',
        'as'=>'downloads.Enable'
    ]);

    Route::post('/update-avatar/{profile}','ArtistController@upload_avatar');

  });

  Route::prefix('admin')->middleware(['auth'])->group(function () {
        Route::prefix('umas')->group(function (){
            Route::get('/artists/create','UmaArtistController@create')->name('umas.artists.create');
            Route::post('/artists','UmaArtistController@store')->name('umas.artists.store');
          });


      });
