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
    return view('home');
});

Auth::routes();

Route::get('/home', 'homeController@index')->name('home');

Route::get('/recipes', 'RecipeController@index');
Route::get('/recipe', 'RecipeController@create');
Route::post('/recipes', 'RecipeController@store');
Route::get('/recipe/{id}', 'RecipeController@show');