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

Route::group(['prefix' => 'admin'], function() {
    Route::get('/',         function () { return redirect('/admin/home'); });
    Route::get('login',     'Admin\LoginController@showLoginForm')->name('admin.login');
    Route::post('login',    'Admin\LoginController@login');
});


Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin'], function() {
    Route::post('logout',   'Admin\LoginController@logout')->name('admin.logout');
    Route::get('home',      'Admin\HomeController@index')->name('admin.home');
});

Route::get('member/index','MemberController@index')->name('member.index');
Route::get('member/create','MemberController@create')->name('member.create');
Route::post('member/store','MemberController@store')->name('member.store');
Route::get('member/show/{id}','MemberController@show')->name('member.show');
Route::get('member/edit/{id}','MemberController@edit')->name('member.edit');
Route::post('member/update/{id}','MemberController@update')->name('member.update');
Route::post('member/destroy/{id}','MemberController@destroy')->name('member.destroy');

Route::get('shift/index','ShiftController@index')->name('shift.index');
Route::get('shift/create' , 'ShiftController@create')->name('shift.create');
Route::post('shift/store', 'ShiftController@store')->name('shift.store');
Route::get('shift/show/{id}', 'ShiftController@show')->name('shift.show');
Route::get('shift/edit/{id}','ShiftController@edit')->name('shift.edit');
Route::post('shift/update/{id}','ShiftController@update')->name('shift.update');
