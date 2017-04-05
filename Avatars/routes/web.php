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
    return view('home');
})
->name('home');

Auth::routes();

Route::get('/home', 'HomeController@afficherUsers');

Route::get('/home/insertAvatar', function () {
    return view('insertAvatarForm');
})
->name ('insertAvatar');

Route::post('/home/insertAvatar')
    ->name('addAvatarSubmit')
    ->uses('HomeController@addAvatarSubmit');

Route::get('/avatar/{email}')
    ->name('downloadAvatar')
    ->uses('HomeController@downloadAvatar');

Route::get('/home/listerAvatars', function () {
    return view('listerAvatars');
})
    ->name ('listerAvatars');

Route::get('/home/listerAvatars')
    ->uses('HomeController@listerAvatars')
    ->name('listerAvatars');

Route::get('/home/listerAvatars/{email}')
    ->uses('HomeController@deleteAvatar')
    ->name('deleteAvatar');
