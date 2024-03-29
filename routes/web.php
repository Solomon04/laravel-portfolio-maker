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

Route::get('/', 'PageController@index');

Auth::routes(['register' => false]);

Route::get('dashboard', 'DashboardController@index')->name('dashboard');
Route::post('new', 'DashboardController@add')->name('new.project');
