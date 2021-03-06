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



/*
Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello', function () {
   // return 'Hello welcome';
     return  '<h1>Hello World</h1>';
});

Route::get('/users/{id}/{name}', function ($id, $name) {
    return 'This is user '.$name.' with an id of '.$id;
});
*/

Route::get('/', 'PagesController@index');
Route::get('/about', 'PagesController@about');
Route::get('/services', 'PagesController@services');

Route::resource('posts', 'PostsController');

Route::post('/posts/{id}/update_custom', 'PostsController1@update_custom');
Route::get('/posts/{id}/delete_custom', 'PostsController1@delete_custom');

Route::get('/users', 'UsersController1@index');
Route::post('/users/login', 'UsersController1@login');
Route::get('/users/logout', 'UsersController1@logout');

Route::get('/dashboard', 'DashboardController1@index');


Auth::routes();

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');/*changed 'home' to 'dashboard'*/
