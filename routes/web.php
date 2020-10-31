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

# ruta home
Route::get('/','PageController@posts');
# metodo post
Route::get('blog/{post}', 'PageController@post')->name('post');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

# Ruta para los articulos
Route::resource('posts', 'Backend\PostController')
	->middleware('auth') # protegemos el controlador
	->except('show'); # usamos todos los metodos excepto show
