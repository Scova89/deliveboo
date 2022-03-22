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

// Rotte ristoranti
Route::get('/ristoranti', 'Api\RestaurantController@index');
Route::get('/ristoranti/{slug}', 'Api\RestaurantController@show');
Route::get('/ristoranti/search/{string}', 'Api\RestaurantController@search');

// Rotte categorie
Route::get('/categorie', 'Api\TypologyController@index');
Route::get('/categorie/{slug}', 'Api\TypologyController@show');

// Rotte prodotti
Route::get('/prodotti/{slug}', 'Api\ProductController@show');

//rotte braintree
Route::get('/order/generate', 'Api\OrderController@generateToken');
Route::post('/order/payment', 'Api\OrderController@makePayment');
Route::post('/order/checkdata','Api\OrderController@checkdata');