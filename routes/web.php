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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//user
Route::get('user/home', 'userControler@show')->name('userhome');  //here
Route::get('user/view-history','userControler@history')->name('view-history');
Route::get('user/add_to_cart/{id}','userControler@add_to_cart')->name('add_to_cart');
Route::get('user/session/add_to_cart/{id}','userControler@add_to_card_by_session')->name('add_to_card_by_session');
Route::get('user/session/save_DB','userControler@save_session')->name('save_session');
Route::get('user/session/get_session','userControler@get_session')->name('get_session');

// admin
Route::get('admin/home', 'adminControler@show')->name('adminhome');  //here
Route::get('admin/insert_page', 'adminControler@insert_page')->name('insert_page');//here
Route::post('admin/add/save','adminControler@add')->name('add_prod');//here
Route::get('admin/edit/{id}','adminControler@view_edit')->name('view_edit');
Route::post('admin/edit/save/{id}','adminControler@edit')->name('edit_prod');
Route::get('admin/delete/{id}','adminControler@delete')->name('delete_prod');
