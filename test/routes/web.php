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

Route::get('/', function () {
    return view('welcome');
});
Route::prefix('category')->group(function () {
    route::get('/', [
        'as' => 'category.index',
        'uses' => 'App\Http\Controllers\CategoryController@index',
    ]);
    Route::get('/create', [
        'as' => 'category.create', 
        'uses' => 'App\Http\Controllers\CategoryController@create', 
    ]);
    Route::post('/store', [
        'as' => 'category.store',
        'uses' => 'App\Http\Controllers\CategoryController@store',
    ]);
    Route::get('/delete/{id}', [
        'as' => 'category.delete',
        'uses' => 'App\Http\Controllers\CategoryController@delete',
    ]);
    Route::get('/edit/{id}', [
        'as' => 'category.edit',
        'uses' => 'App\Http\Controllers\CategoryController@edit',
    ]);
    route::post('/update/{id}', [
        'as' => 'category.update',
        'uses' => 'App\Http\Controllers\CategoryController@update',
    ]);
});

Route::prefix('product')->group(function () {
    Route::get('/', [
        'as' => 'product.index',
        'uses' => 'App\Http\Controllers\ProductController@index'
    ]);
    Route::get('/create', [
        'as' => 'product.create',
        'uses' => 'App\Http\Controllers\ProductController@create'
    ]);
    Route::post('/store', [
        'as' => 'product.store',
        'uses' => 'App\Http\Controllers\ProductController@store'
    ]);
    Route::get('/edit/{id}', [
        'as' => 'product.edit',
        'uses' => 'App\Http\Controllers\ProductController@edit'

    ]);
    Route::post('/update/{id}', [
        'as' => 'product.update',
        'uses' => 'App\Http\Controllers\ProductController@update'
    ]);
    Route::get('/delete/{id}', [
        'as' => 'product.delete',
        'uses' => 'App\Http\Controllers\ProductController@delete'
    ]);
});