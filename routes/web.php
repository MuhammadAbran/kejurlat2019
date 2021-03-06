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
   //AJAX DATA
   Route::get('dataPembayaran', 'AdminController@pembayaran_data')->name('pembayaran.data');

   Route::get('dashboard', 'AdminController@index')->name('dashboard.admin');
   Route::get('upload', 'AdminController@uploadShow')->name('upload.admin');
   Route::get('kolat/{id}', 'AdminController@kolatShow')->name('kolat.admin');
   Route::get('pembayaran', 'AdminController@pembayaranShow')->name('pembayaran.admin');
   Route::get('agenda', 'AdminController@agendaShow')->name('agenda.admin');
   Route::get('pengumuman', 'AdminController@pengumumanShow')->name('pengumuman.admin');
});

//USER ROUTER
Route::group(['prefix' => 'user', 'middleware' => 'auth'], function(){
   Route::get('dashboard', 'UserController@index')->name('dashboard.user');
   Route::get('agenda', 'UserController@agenda')->name('agenda.user');
   // Upload berkas
   Route::get('upload', 'UserController@uploadShow')->name('upload.user');
   Route::get('uploadGetData', 'UserController@uploadGetData')->name('upload.getData');
   Route::post('upload', 'UserController@upload')->name('upload.user.data');
   Route::post('upload_delete', 'UserController@uploadDel')->name('upload.user.del');
   Route::post('kunci_data', 'UserController@uploadKunci')->name('upload.kunci.data');

   //Atlit & Official Management
   Route::get('atlit', 'UserController@atlitShow')->name('atlit.user');
   Route::post('official', 'UserController@tambahOfficial')->name('tambah.official');
   Route::post('atlit_foto', 'UserController@fotoAtlit')->name('foto.atlit');
   Route::post('atlit_data', 'UserController@tambahAtlit')->name('tambah.atlit');
   Route::post('atlit_kunci', 'UserController@kunciAtlit')->name('kunci.atlit');
   Route::post('atlit_del', 'UserController@delAtlit')->name('del.atlit');
   Route::post('official_del', 'UserController@delOfficial')->name('del.official');
   Route::post('atlit_edit_data', 'UserController@editDataAtlit')->name('edit.data.atlit');
   Route::post('atlit_edit', 'UserController@editAtlit')->name('edit.atlit');

   // Pembayaran
   Route::get('pembayaran', 'UserController@pembayaranShow')->name('pembayaran.user');
   Route::post('pembayaran_upload', 'UserController@pembayaranUpload')->name('pembayaran.upload');

   // Pengumuman
   Route::get('pengumuman', 'UserController@pengumumanShow')->name('pengumuman.user');
});

//Authenticate ROUTER
Auth::routes();

//AJAX Validation ROUTER
Route::post('email_validation', 'Auth\LoginController@email_validation')->name('email.validation');
Route::post('email_validation_reg', 'Auth\RegisterController@email_validation')->name('email.validation.reg');
Route::post('password_validation', 'Auth\LoginController@password_validation')->name('password.validation');

//REDIRECT ROUTER
Route::get('redirectUser', 'RedirectUserController@redirect')->name('redirect.user');




Route::get('/home', 'HomeController@index')->name('home');
