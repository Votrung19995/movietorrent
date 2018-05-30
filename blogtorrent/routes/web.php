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

//go index:
Route::get('/' ,'HomeController@index');

//go login:
Route::get('/login', 'LoginController@goLogin');

//go register:
Route::get('/register', 'RegisterController@goRegister');

Route::prefix('auth')->group(function () {
    //accept Register:
    Route::post('/register', 'RegisterController@acceptRegister');
});

//Redirect
Route::prefix('redirect')->group(function () {
    //sucess
    Route::get('/sucess', 'RedirectController@goSucess');
});

