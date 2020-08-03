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

//alert画面へのアクセス
Route::get('/alert', 'BaseController@alert');


//クライアントリストへのアクセス
Route::get('/clientList', 'BaseController@clientList');



//top
Route::get('/mypage', 'BaseController@mypage');

//投稿一覧
Route::get('/mypage/toukou', 'BaseController@mypagetoukou');

//投稿編集
Route::get('/mypool_edit/{id}', 'BaseController@mypoolEdit');
Route::post('/mypool_edit/{id}', 'BaseController@mypoolEditcheck');
Route::post('/mypool_edit/done/{id}', 'BaseController@mypoolEditdone');


//投稿削除
Route::get('/mypool_delete/{id}', 'BaseController@mypoolDelete');
Route::post('/mypool_delete/done/{id}', 'BaseController@mypoolDeletedone');

//メッセージ

Route::get('/mypage/chat/{id}', 'BaseController@mypagechat')->name('chat');
//メッセージ機能
Route::post('/add', 'BaseController@add')->name('add');


//受信
Route::get('/mypage/receive', 'BaseController@mypagereceive');

Route::post('/mypage/receive/{id}', 'BaseController@receivereaction');


//送信
Route::get('/mypage/send', 'BaseController@mypagesend');

Route::get('/mypage/send/{id}', 'BaseController@mypagesenddelete');




//登録内容変更
Route::get('/mypage/change', 'BaseController@mypagechange');
//見た目表示
Route::get('/mypage/profile', 'BaseController@mypageprofile');


//mypage 派生ページ  
//登録内容変更処理
Route::get('/mypage/edit/{id}', 'EditController@edit');
Route::post('/mypage/edit/{id}', 'EditController@editCheck');
Route::post('/mypage/edit/done/{id}', 'EditController@editDone');

//退会処理
Route::get('/mypage/delete', 'BaseController@mypagedelete');
Route::get('/delete', 'BaseController@delete');

//パスワード変更
Route::get('/mypage/changepassword', 'EditController@showChangePasswordForm');
Route::post('/mypage/changepassword', 'EditController@changePassword')->name('changepassword');


//pool画面へのアクセス
Route::get('/pool', 'BaseController@getPool');
Route::post('/pool', 'BaseController@poolCheck');
Route::post('/done', 'BaseController@poolDone');


//クライアント登録へのアクセス
Route::get('/client', 'BaseController@client');
Route::post('/client', 'BaseController@clientCheck');
Route::post('/client/clientcomplete', 'BaseController@clientDone');


//search画面へのアクセス
Route::get('/search', 'BaseController@getSearch');

//商品画面の表示
Route::get('/product/{id}', 'BaseController@getProduct')->name('productpage');
//商品購入確認画面
Route::post('/product/check/{id}', 'BaseController@ProductCheck');

//プロフィール画面の表示
Route::get('/profile/{id}', 'BaseController@getProfile');



//login画面へのアクセス
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');


//logout
Route::get('/logout', 'Auth\LoginController@logout');






?>