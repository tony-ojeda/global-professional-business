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



Route::get('/login', [
    'uses' => 'Web\BackendController@login',
    'as' => 'loginView'
]);


Route::group([
    'prefix' => 'admin',
    'as' => 'admin.',
    'middleware' => [],
    'namespace' => 'Web'
], function(){

    Route::get('/', [
        'uses' => 'BackendController@index',
        'as' => 'home'
    ]);
    
    Route::get('/categories', [
        'uses' => 'BackendController@categories',
        'as' => 'categories'
    ]);

    Route::post('/categories/ct', [
        'uses' => 'CategoryController@ct',
        'as' => 'categories.ct'
    ]);

    Route::post('/categories/list', [
        'uses' => 'CategoryController@list',
        'as' => 'categories.list'
    ]);
});