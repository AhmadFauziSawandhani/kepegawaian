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
//     return view('layouts/app');
// });

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

// Profile
Route::get('/profile/{id}', 'ProfileController@edit')->name('profile.edit');
Route::patch('/profile/{id}', 'ProfileController@update')->name('profile.update');

// Setting
Route::get('/setting/{id}', 'BrandController@edit')->name('setting.edit');
Route::patch('/setting/{id}', 'BrandController@update')->name('setting.update');

