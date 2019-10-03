<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\Route;


Route::get('/anime/{id}', function ($id) {
    $anime = \App\Anime::find($id);
    if (!$anime) return redirect('/404');
    return redirect()->route('anime',
        ['id' => $id, 'name' => \Illuminate\Support\Str::slug($anime->name, '-')]);
});
Route::get('/anime/{id}/{name}', 'AnimeAPIController@getAnimeView')->name('anime');
Route::view('/create', 'create.createAll');
Route::post('/createAnime', 'AnimeController@createAnime')->name('create.anime');
Route::post('anime/createSeason', 'AnimeController@createSeason')->name('create.season');

//api
//  home
Route::view('/', 'home.home');
Route::view('/sign-in', 'sign.signin');
Route::view('/sign-up', 'sign.signup');
//Route::view('/', 'home.home');
Route::get('getList-api', 'EpisodeAPIController@getList');
Route::get('getAnime-api/{id}', 'AnimeAPIController@getAnime');
Route::get('getTarget-api/{id}', 'AnimeAPIController@getTarget');
Route::get('getCategories-api/{id}', 'AnimeAPIController@getCategories');
Route::get('getRelations-api/{id}','AnimeAPIController@getRelations');
Route::get('getFansubs-api/{id}','AnimeAPIController@getFansubs');
Route::get('getEpisodes-api/{id}','AnimeAPIController@getEpisodes');

Route::get('animecontroller-api/{id}', 'AnimeAPIController@show');
Route::get('episodecontroller-api/{id}', 'EpisodeAPIController@show');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
