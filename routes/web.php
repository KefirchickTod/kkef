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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['namespace' => 'Kk', 'prefix' => 'kk'], function (){
    Route::group(['namespace' => 'Articles'], function (){
        Route::resource('article/categories', 'ArticleCategoryController')->names('kk.article.categories');
        Route::resource('article', 'ArticleController')->names('kk.article');
    });
});
