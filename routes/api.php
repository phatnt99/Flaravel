<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::apiResource('catalogs', 'API\FlowerCatalogController');

Route::apiResource('flowers','API\FlowerController');

Route::get('fractals','API\FlowerController@indexWithTransformer');

Route::prefix('jwt')->group(function() {
    Route::post('/register', 'API\AuthController@register');
    Route::post('/login', 'API\AuthController@login');
    Route::get('/user', 'API\AuthController@getAuthenticatedUser')->middleware('jwt.auth');
    Route::get('/logout', 'API\AuthController@logout');

});

