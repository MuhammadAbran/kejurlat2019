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
//LANDING PAGE
Route::get('/', function () {
    return view('welcome');
})->name('landing');

//ADMIN ROUTER
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']], function(){
   Route::get('dashboard', 'AdminController@index')->name('dashboard.admin');
});

//USER ROUTER
Route::group(['prefix' => 'user', 'middleware' => 'auth'], function(){
   Route::get('dashboard', 'UserController@index')->name('dashboard.user');
});

//Authenticate ROUTER
Auth::routes();

//AJAX Validation ROUTER
Route::post('email_validation', 'Auth\LoginController@email_validation')->name('email.validation');
Route::post('password_validation', 'Auth\LoginController@password_validation')->name('password.validation');

//REDIRECT ROUTER
Route::get('redirectUser', 'RedirectUserController@redirect')->name('redirect.user');




Route::get('/home', 'HomeController@index')->name('home');
