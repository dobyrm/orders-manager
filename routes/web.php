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

// Redirect route
Route::redirect('/', '/orders');
Route::redirect('/home', '/orders');

// Orders resource
Route::resource('orders', 'Order\OrderController');
Route::get('orders/search/field', ['uses' => 'Order\OrderController@search'])->name('order.search');
Route::get('orders/graph/build', ['uses' => 'Order\OrderController@orderGraph'])->name('order.graph');
