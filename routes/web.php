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

Route::group(["prefix" => "author", "name" => "author."], function (){
  Route::get('/', function(){
    return redirect('author/dashboard');
  });
  Route::get('/dashboard',function(){
    return view('author.dash');
  });
  Auth::routes();
});

Route::get('/home', 'HomeController@index')->name('home');
