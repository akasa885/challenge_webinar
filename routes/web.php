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

Route::get('/', 'IndexController@index')->name('article');

Route::prefix('author')->name('author.')->group(function (){
  Route::get('/', function(){return redirect('author/dashboard');});
  Route::get('/dashboard', 'Authors\IndexController@index')->middleware('auth')->name('dashboard');

  Route::group(["prefix" => 'post', "as" => 'post.', "middleware" => 'auth'], function (){
    Route::get('/','Authors\PostingController@viewContentPost')->name('view');
    Route::get('/user-post-view', 'Authors\PostingController@getAllpost')->middleware('auth')->name('dtb_post');
    Route::get('/create','Authors\PostingController@createContent')->name('viewForm');
    Route::post('/create','Authors\PostingController@storeContent')->name('sendForm');
    Route::get('/edit/{id}','Authors\PostingController@editPosting')->name('editPost');
    Route::get('/detele/{id}', 'Authors\PostingController@deletePosting')->name('delPost');
  });

});
  Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
