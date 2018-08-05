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

//go register:
Route::get('/logOut', 'LoginController@logOut');

//autocomplete:
Route::get('searchajax',array('as'=>'searchajax','uses'=>'SearchController@autoComplete'));

Route::prefix('auth')->group(function () {
    //accept Register:
    Route::post('/register', 'RegisterController@acceptRegister');

    //accept login:
    Route::post('/login', 'LoginController@login');

    //google login:
    Route::get('/google', 'LoginController@redirectToProvideGoogle');
    Route::get('/google/callback', 'LoginController@handleProviderCallbackGoogle');
});

//Redirect
Route::prefix('redirect')->group(function () {
    //sucess
    Route::get('/success', 'RedirectController@goSucess')->middleware('isRegister');
    
    //go 404 page
    Route::get('/404', 'RedirectController@go404');

});

//go Home page
Route::get('/goHome', 'RedirectController@goHome');
Route::get('/test', 'MovieController@test');

//go admin page:
Route::group(['prefix' => 'admin',  'middleware' => 'isAdmin'],function () {
    //go admin page:
    Route::get('/home', 'AdminController@goAdmin');
    //go admin page:
    Route::post('/post', 'AdminController@post');
    //go delete file:
    Route::post('/deleteFile', 'AdminController@deleteFile');
});

//go to movie detail
Route::prefix('movie')->group(function () {
    //go admin page:
    Route::get('/{slug}', 'MovieController@movieDetail');
});

//go to movie detail
Route::prefix('watch-movie')->group(function () {
    //go admin page:
    Route::get('/{slug}', 'MovieController@watch');
    //get link stream:
    Route::post('/link/{serverId}','MovieController@link');
});

//go to movie detail
Route::prefix('api')->group(function () {
    //go admin page:
    Route::get('/get/{slug}', 'MovieController@getUrl');
});

