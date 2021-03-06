<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes(['verify' => true]);

Route::prefix("admin")->namespace("Admin")->middleware("verified")->group(
    function () {   
    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('products', 'ProductsController');
    Route::resource('typologies', 'TypologiesController');
    Route::resource('orders', 'OrdersController');
});

Route::get("{any?}", function () {
    return view("front");
})->where("any", ".*");