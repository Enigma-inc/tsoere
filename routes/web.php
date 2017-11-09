<?php



Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

//Artist Public Page
Route::get('/umas', 'UmasController@index')->name('umas.home');
Route::get('/umas/{slug}', 'UmasController@getSingleSong')->name('umas.single');

//Artist Public Page
Route::get('/artist/{slug}', 'ArtistController@index')->name('artist.home');

//Single Track Public Page
Route::get('/artist/{artistSlug}/single/{trackSlug}','ArtistController@singleTrack')->name('track.single');
 //Record social media sharing
 Route::get('shared/{track}', 'TrackController@socialShared')->name('track.share');
//Record Track Play
 Route::get('played/{track}', 'TrackController@recordTrackPlay')->name('track.play');
//Downlaod Track Route
 Route::get('download/{track}','TrackController@download')->name('track.download');
//Search Page
Route::get('/search','SearchController@index')->name('search');
 //genre pages route
Route::get('/category/{genre}','CategoryPageController@index')->name('track.category');

Route::group(['middleware'=>'auth'],function(){
    Route::get('/profile', 'ProfileController@index')->name('profile');
    Route::get('/profile/edit', 'ArtistController@edit')->name('profile.edit');
    Route::post('/profile/additional-info/{artistId}','ProfileController@additionalInfo')->name('profile.additionalinfo');
    Route::get('/tracks/upload', 'TrackController@create')->name('track.create');
    Route::post('/tracks/{artistId}','TrackController@store')->name('track.store');
    //routes for updating track details
    Route::post('/tracks/artwork/{trackId}','TrackController@artworkUpdate')->name('track.artwork.update');

    Route::post('/tracks/title/{trackId}','TrackController@titleUpdate')->name('track.title.update');

    Route::get('/update-avatar/artist','ArtistController@update')->name('artist.avatar-update');

     Route::post('/tracks/{id}/trash','TrackController@trash')->name('track.trash');

    Route::post('/tracks/{id}/untrash','TrackController@untrash')->name('track.untrash');

    Route::post('tracks/{id}/disableDownloads','TrackController@downloadsDisable')->name('downloads.disable');
    Route::post('tracks/{id}/enableDownloads','TrackController@downloadsEnable')->name('downloads.Enable');

    Route::post('/update-avatar/{profile}','ArtistController@upload_avatar');

  });

  Route::prefix('admin')->middleware(['auth'])->group(function () {
        Route::prefix('umas')->group(function (){
            Route::get('/artists/create','UmaArtistController@create')->name('umas.artists.create');
            Route::post('/artists','UmaArtistController@store')->name('umas.artists.store');
          });


      });
