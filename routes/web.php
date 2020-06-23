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
Route::get('/info', function (){
    phpinfo();
    });

Route::get('/', function () {
    return view('welcome');
});

//top画面へのアクセス
Route::get('/top', 'BaseController@getTop');

//新規登録画面へのアクセス
Route::get('/create', 'BaseController@create');
Route::post('/create', 'BaseController@createCheck');
Route::post('/create/done', 'BaseController@createlDone');

//login画面へのアクセス
Route::get('/login', 'BaseController@getLogin');

//pool画面へのアクセス
Route::get('/pool', 'BaseController@getPool');
Route::post('/pool', 'BaseController@poolCheck');
Route::post('/done', 'BaseController@poolDone');

//search画面へのアクセス
Route::get('/search', 'BaseController@getSearch');

//商品画面の表示
Route::get('/product/{id}', 'BaseController@getProduct');


?>