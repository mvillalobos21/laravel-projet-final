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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@afficherUsers');

Route::get('/home/insertAvatar', function () {
    return view('insertAvatarForm');
})
->name ('insertAvatar');

Route::post('/home/insertAvatar')
    ->name('addAvatarSubmit')
    ->uses('HomeController@addAvatarSubmit');