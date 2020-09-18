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

// Route::get('/', function () {
//     return view('login');
// });

Auth::routes();

// Route::get('/', 'HomeController@index')->name('home');
// Route::get('/food', 'FoodController@index')->name('food');
// Route::get('/cashier', 'HomeController@cashier')->name('cashier');
// Route::resources('food', 'FoodController');

Route::resources([
    '/' => 'HomeController',
    'food' => 'FoodController',
    'cashier' => 'CashierController',
    'transaction' => 'TransactionController',
]);
