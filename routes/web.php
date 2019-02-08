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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function(){
    return view('home.home');
});
Route::view('/single_anime','single_anime.anime');
Route::get('/try','HomeController@paginationControl');
Route::get('getlist',function(){
    $animelist = new \App\Http\Controllers\HomeController();
   echo json_encode($animelist->createFakeData());
   return;
});

Route::get('anime/createSeason','AnimeController@createSeason')->name('season.create');
Route::view('/create', 'create.createAll');
Route::post('/createAnime', 'AnimeController@createAnime')->name('create.anime');