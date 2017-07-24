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

Route::get('/', 'HomeController@index');
Route::get('/jadwal', 'HomeController@jadwal');

Route::get('/login', 'AuthController@showLoginForm');
Route::post('/login', 'AuthController@login');
Route::get('/logout', 'AuthController@logout');

Route::get('/admin', ['uses' => 'AdminController@index', 'as' => 'index.admin']);
Route::post('/admin/accept', 'AdminController@accept');
Route::post('/admin/reject', 'AdminController@reject');
Route::post('/admin/delete', 'AdminController@delete');

Route::get('/reserve', ['uses' => 'HomeController@showReserve', 'as' => 'add.reservation']);
Route::post('/reserve', 'HomeController@reserve');

Route::get('/register', 'AuthController@showRegister');
Route::post('/register', 'AuthController@register');