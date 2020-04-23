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

//anime_routing
Route::get('/anime/{id}', function ($id) {
    $anime = \App\Anime::find($id);
    if (!$anime) return redirect('/404');
    return redirect()->route('anime',
        ['id' => $id, 'name' => \Illuminate\Support\Str::slug($anime->name, '-')]);
});
Route::get('/anime/{id}/{name}', 'AnimeAPIController@getAnimeView')->name('anime');

//fansub_routing
Route::get('/fansub/{id}', function ($id) {
    $fansub = \App\Fansub::find($id);
    if (!$fansub) return redirect('/404');
    return redirect()->route('fansub',
        ['id' => $id, 'name' => \Illuminate\Support\Str::slug($fansub->name, '-')]);
});
Route::get('/fansub/{id}/{name}', 'FansubAPIController@getFansubView')->name('fansub');


Route::view('/create', 'create.createAll');
Route::post('/createAnime', 'AnimeController@createAnime')->name('create.anime');
Route::post('anime/createSeason', 'AnimeController@createSeason')->name('create.season');

//  home
Route::view('/', 'home.home');
Route::view('/sign-in', 'sign.signin');
Route::view('/sign-up', 'sign.signup');

//call with axios
Route::get('getList-api', 'EpisodeAPIController@getList');
Route::get('getAnimeInfo-api/{id}', 'AnimeAPIController@getAnime');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
