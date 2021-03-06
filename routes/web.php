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

//top画面へのアクセス
Route::get('/top', 'BaseController@getTop');

//alert画面へのアクセス
Route::get('/alert', 'BaseController@alert');


// 書類一覧
// 労働者派遣契約書
Route::get('/documents/hakenn', 'BaseController@hakenn');
Route::post('/documents/hakennCheck', 'BaseController@hakennCheck');

// 労働者派遣通知書
Route::get('/documents/tuuti', 'BaseController@tuuti');
Route::post('/documents/tuutiCheck', 'BaseController@tuutiCheck');

// 労働条件通知書
Route::get('/documents/jyoukenn', 'BaseController@jyoukenn');
Route::post('/documents/jyoukennCheck', 'BaseController@jyoukennCheck');
//top
Route::get('/mypage', 'BaseController@mypage');

//投稿一覧
Route::get('/mypage/toukou', 'BaseController@mypagetoukou');
// matter
Route::get('/client/clientMatter/{id}', 'BaseController@clientMatter');

//投稿編集
Route::get('/mypool_edit/{id}', 'BaseController@mypoolEdit');
Route::post('/mypool_edit/{id}', 'BaseController@mypoolEditcheck');
Route::post('/mypool_edit/done/{id}', 'BaseController@mypoolEditdone');


//投稿削除
Route::get('/mypool_delete/{id}', 'BaseController@mypoolDelete');
Route::post('/mypool_delete/done/{id}', 'BaseController@mypoolDeletedone');



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

//権限変更
Route::get('/mypage/authority', 'PermissionController@config');
Route::get('/mypage/authority/edit/{id}', 'PermissionController@editAuthority');
Route::post('/mypage/authority/edit/done', 'PermissionController@editAuthorityDone');


//仮登録l画面へのアクセス
Route::get('/pool', 'BaseController@getPool');
Route::post('/pool', 'BaseController@poolCheck');
Route::post('/done', 'BaseController@poolDone');

//本登録l画面へのアクセス
Route::get('/mainpool', 'BaseController@getmainPool');
Route::post('/mainpool', 'BaseController@mainpoolCheck');
Route::post('/maindone', 'BaseController@mainpoolDone');

//クライアント登録へのアクセス
Route::get('/client', 'BaseController@client');
Route::post('/client', 'BaseController@clientCheck');
Route::post('/client/clientcomplete', 'BaseController@clientDone');

// クライアント詳細アクセス
Route::get('/clientMore/{id}','BaseController@clientMore')->name('clientMorepage');
Route::get('/csv/downloadclient/{id}','BaseController@downloadclient');

//クライアント編集
Route::get('/client_edit/{id}', 'BaseController@clientEdit');
Route::post('/client_edit/{id}', 'BaseController@clientEditcheck');
Route::post('/client_edit/done/{id}', 'BaseController@clientEditdone');



//クライアント削除
Route::get('/client_delete/{id}', 'BaseController@clientDelete');
Route::post('/clientDeletedone/{id}', 'BaseController@clientDeletedone');


//案件登録画面へのアクセス
Route::get('/clientWorks/{id}', 'BaseController@clientWorks');
Route::post('/clientWorks', 'BaseController@clientWorksCheck');
Route::post('/clientWorks/clientWorks_complete', 'BaseController@clientWorksDone');

// クライアント案件一覧
Route::get('/clientworkList','BaseController@clientworkList')->name('clientWorkListpage');

// 案件詳細確認ｃｓｖ
Route::get('/clientworkMore/{id}','BaseController@clientworkMore')->name('clientworkMorepage');
Route::get('/csv/downloadworks/{id}','BaseController@downloadworks');


//案件編集
Route::get('/clientworksEdit/{id}', 'BaseController@clientworksEdit');
Route::post('/clientworksEdit/{id}', 'BaseController@clientworksEditcheck');
Route::post('/clientworksEdit/done/{id}', 'BaseController@clientworksEditdone');

//案件削除
Route::get('/clientwork_delete/{id}', 'BaseController@clientworkDelete');
Route::post('/clientworkDeletedone/{id}', 'BaseController@clientworkDeletedone');

//search画面へのアクセス
Route::get('/search', 'BaseController@getSearch');

//クライアントリスト画面へのアクセス
Route::get('/clientList', 'BaseController@clientList');

//商品画面の表示

//仮登録検索画面へのアクセス
Route::get('/search', 'BaseController@getSearch');

//本登録検索画面へのアクセス
Route::get('/mainsearch', 'BaseController@mainSearch');

//csv
Route::get('csv/staffdownload', 'BaseController@staffdownload');


//本登録の表示

Route::get('/product/{id}', 'BaseController@getProduct')->name('productpage');
Route::post('/product/done/{id}', 'BaseController@productDone');

//salary
Route::get('/salary/{id}', 'BaseController@getsalary');
Route::post('/salary/done/{id}', 'BaseController@salarydone');

//genuine
Route::get('/genuine/{id}', 'BaseController@getgenuine');
Route::post('/genuine/done/{id}', 'BaseController@skilldone');

//family
Route::get('/family/{id}', 'BaseController@getfamily');
Route::post('/family/done/{id}', 'BaseController@familydone');

//hope
Route::get('/hope/{id}', 'BaseController@gethope');
Route::post('/hope/done/{id}', 'BaseController@hopedone');


//agreement
Route::get('/agreement/{id}', 'BaseController@getagreement');
Route::post('/agreement/done/{id}', 'BaseController@agreementdone');


//memo
Route::get('/memo/{id}', 'BaseController@getmemo');
Route::post('/memo/done/{id}', 'BaseController@memodone');



//login画面へのアクセス
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');


//logout
Route::get('/logout', 'Auth\LoginController@logout');

//mail

Route::get('/workmail/{id}', 'BaseController@getworkmail');





?>