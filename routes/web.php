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
    return redirect('login');
});

Route::get('/login', 'MainController@loginPage');
Route::post('/login', 'MainController@loginAttempt');

// Disini bagian routing user biasa
Route::get('/homepage', 'MainController@homepage');

// Disini bagian routing admin
Route::get('/admin', function(){
    return redirect('/admin/home');
});

Route::get('/admin/home', 'MainController@adminHome');

Route::get('/admin/arsip', 'MainController@adminArsip');
Route::get('/admin/arsip/form/{id}', 'MainController@adminArsipForm');
Route::get('/admin/arsip/form', 'MainController@adminArsipForm');
Route::post('/admin/arsip/form/{id}', 'MainController@adminArsipForm');
Route::post('/admin/arsip/form', 'MainController@adminArsipForm');
Route::get('/admin/arsip/delete/{id}', 'MainController@arsipHapus');
Route::get('/admin/arsip/view/{id}', 'MainController@arsipView');

Route::get('/admin/user', 'MainController@adminUser');
Route::get('/admin/user/form/{id}', 'MainController@adminUserForm');
Route::get('/admin/user/form', 'MainController@adminUserForm');
Route::post('/admin/user/form/{id}', 'MainController@adminUserForm');
Route::post('/admin/user/form', 'MainController@adminUserForm');

Route::get('/admin/test', "MainController@test");