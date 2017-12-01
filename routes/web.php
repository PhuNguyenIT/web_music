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

use App\Album;


Route::get('/', function () {
    return view('welcome');
});

// Route::get('thu',function(){
// 	return view('admin.style.danhsach');
// });


Route::group(['prefix'=>'admin'],function(){
	Route::group(['prefix'=>'style'],function(){
		// admin/style/danhsach
		Route::get('danhsach','StyleController@getDanhsach');

		Route::get('sua/{id}','StyleController@getSua');
		Route::post('sua/{id}','StyleController@getSua');

		Route::get('them','StyleController@getThem');
		Route::post('them','StyleController@postThem');

		Route::get('xoa/{id}', 'StyleController@getXoa');
	});

	Route::group(['prefix'=>'album'],function(){
		// admin/album/danhsach
		Route::get('danhsach','AlbumController@getDanhsach');

		Route::get('sua/{id}','AlbumController@getSua');
		Route::post('sua/{id}','AlbumController@postSua');

		Route::get('them','AlbumController@getThem');
		Route::post('them','AlbumController@postThem');

		Route::get('xoa/{id}', 'AlbumController@getXoa');
	});

	Route::group(['prefix'=>'song'],function(){
		// admin/style/danhsach
		Route::get('danhsach','SongController@getDanhsach');

		Route::get('sua/{id}','SongController@getSua');
		Route::post('sua/{id}','SongController@postSua');
		
		Route::get('them','SongController@getThem');
		Route::post('them','SongController@postThem');

		Route::get('xoa/{id}', 'SongController@getXoa');
	});

	Route::group(['prefix'=>'singer'],function(){
		// admin/style/danhsach
		Route::get('danhsach','SingerController@getDanhsach');

		Route::get('sua/{id}','SingerController@getSua');
		Route::post('sua/{id}','SingerController@postSua');

		Route::get('them','SingerController@getThem');
		Route::post('them','SingerController@postThem');

		Route::get('xoa/{id}', 'SingerController@getXoa');
	});

	Route::group(['prefix'=>'user'],function(){
		// admin/user/danhsach
		Route::get('danhsach','UserController@getDanhsach');

		Route::get('sua','UserController@getSua');

		Route::get('them','UserController@getThem');
		Route::post('them','UserController@postThem');

		Route::get('xoa/{id}','UserController@getXoa');
	});
});

Route::get('trangchu','PagesController@trangchu');
Route::get('album','PagesController@album');
Route::get('singer','PagesController@singer');
Route::get('style','PagesController@style');
Route::get('contact','PagesController@contact');
Route::get('song','PagesController@song');



