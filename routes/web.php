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
Route::get('dashboard', function(){
   return view('admin.dashboard');
});

Route::get('/', function () {
    return view('welcome');
})->name('landing');

Auth::routes();
Route::post('email_validation', 'Auth\LoginController@email_validation')->name('email.validation');
Route::post('password_validation', 'Auth\LoginController@password_validation')->name('password.validation');

Route::get('/home', 'HomeController@index')->name('home');

// Route::get('redirectUser', )
