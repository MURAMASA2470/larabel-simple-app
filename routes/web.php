<?php
use App\Post;
use App\User;

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

Route::get('/',"PostController@index");

Route::resource("posts","PostController");


//ログイン中のユーザのみ許可
// Route::group(['middleware' => ['auth']], function () {

// });

// 権限にWriteが付与されているユーザのみ許可
Route::group(['middleware' => ['permission:Write']], function () {
    Route::get('users/export', 'UserController@export');
    Route::resource("users","UserController");
});

// 権限にReadが付与されているユーザのみ許可
Route::group(['middleware' => ['permission:Read']], function () {
    Route::resource("users","UserController", ['only' => ['index', 'show']]);
});

Route::get('/home', 'HomeController@index');

Auth::routes();
