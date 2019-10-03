<?php

use Illuminate\Http\Request;
use Illuminate\Routing\Router;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*
* Snippet for a quick route reference
*/
Route::get('/', function (Router $router) {
    return collect($router->getRoutes()->getRoutesByMethod()["GET"])->map(function($value, $key) {
        return url($key);
    })->values();   
});

Route::resource('anime', 'AnimeAPIController', [
    'only' => ['index', 'show', 'store', 'update', 'destroy']
]);

Route::resource('targets', 'TargetAPIController', [
    'only' => ['index', 'show', 'store', 'update', 'destroy']
]);

Route::resource('categories', 'CategoryAPIController', [
    'only' => ['index', 'show', 'store', 'update', 'destroy']
]);

Route::resource('episodes', 'EpisodeAPIController', [
    'only' => ['index', 'show', 'store', 'update', 'destroy']
]);

Route::resource('fansubs', 'FansubAPIController', [
    'only' => ['index', 'show', 'store', 'update', 'destroy']
]);

Route::resource('fansubbers', 'FansubberAPIController', [
    'only' => ['index', 'show', 'store', 'update', 'destroy']
]);

Route::resource('users', 'UserAPIController', [
    'only' => ['index', 'show', 'store', 'update', 'destroy']
]);