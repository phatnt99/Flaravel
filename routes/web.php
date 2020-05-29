<?php

use Illuminate\Support\Facades\Route;

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

 Route::get('/', function () {
     echo 'hello';
 });

Route::get('flowers', 'FlowerController@index');

Route::get('orderbyname', 'FlowerController@orderByName');

Route::get('pricemorethanx','FlowerController@getFlowerWithPriceMoreThanX');

Route::get('flowersbycatalog','FlowerController@getFlowerByCatalog');

Route::get('cvx','FlowerController@getCountFlowersForeachCatalog');

Route::get('lflowers','FlowerController@getTableView');

Route::get('mflowers','FlowerController@getFlowerCreatedByMonth');

Route::get('re', function() {
    echo 'hi';
});

Route::get('/view','FlowerCatalogController@index');
Route::get('/updatecatalog/{flowerCatalog}','FlowerCatalogController@update');
