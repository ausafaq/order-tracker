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

Route::get('/', 'LineController@index_redirect');

Route::resource('lines', 'LineController')
    ->except(['edit', 'update']);
Route::resource('items', 'ItemController')
    ->except(['index', 'show', 'destroy']);
