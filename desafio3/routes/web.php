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
})->name('welcome');
//produtos
Route::get('/produtos', 'ProductController@index')->name('products.index');
Route::get('/produtos/create', 'ProductController@create')->name('products.create');
Route::post('/produtos', 'ProductController@store')->name('products.store');
Route::get('/produtos/{id}/edit', 'ProductController@edit')->name('products.edit');
Route::put('/produtos/{id}', 'ProductController@update')->name('products.update');
Route::delete('/produtos/{id}', 'ProductController@destroy')->name('products.destroy');

//categorias
Route::get('/categorias', 'CategoryController@index')->name('categories.index');
Route::get('/categorias/create', 'CategoryController@create')->name('categories.create');
Route::post('/categorias', 'CategoryController@store')->name('categories.store');
Route::get('/categorias/{id}/edit', 'CategoryController@edit')->name('categories.edit');
Route::put('/categorias/{id}', 'CategoryController@update')->name('categories.update');
Route::delete('/categorias/{id}', 'CategoryController@destroy')->name('categories.destroy');
