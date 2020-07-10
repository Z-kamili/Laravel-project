<?php

use Illuminate\Support\Facades\Auth;
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
// Route::get('/', function () {
//     return view('home');
// });
// Route::get('/about', function () {
//     return view('about');
// });
//router dynamic
Route::get('/',function(){
return view("welcome");
});
// Route::get('','HomeController@home')->name('home');
Route::get('/home','HomeController@index')->name('index');
Route::get('/about','HomeController@about')->name('about');
Route::get('/about','HomeController@about')->name('about');
//generer une route de ressource crud
Route::resource('/posts','PostController');
// Route::get('/posts/{id}/{author?}','HomeController@post')->name('post');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
