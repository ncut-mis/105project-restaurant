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
    return view('/auth/login11');
});

Route::get('222',['as' => 'admin.users.index' , 'uses' => 'StaffController@index']);
Route::get('login/{id}' ,['as' => 'admin.users.login' , 'uses' => 'StaffController@login']);

Auth::routes();
Route::get('logout', 'Auth\LoginController@logout');

//Route::get('/home', 'HomeController@index')->name('home');

//Route::get('index', function () {
//    return view('/index');
//});

/*餐廳後台*/
Route::group(['prefix' => 'backstage'], function() {
    Route::get('/home'                  , ['as' => 'backstage.dashboard.index'      , 'uses' => 'StaffController@login2']);
    Route::get('manager/staff'          , ['as' => 'backstage.manager.staff.index'  , 'uses' => 'StaffController@index1']);
    Route::get('manager/staff/create'   , ['as' => 'backstage.manager.staff.create' , 'uses' => 'StaffController@create1']);
    Route::get('manager/staff/{id}/edit', ['as' => 'backstage.manager.staff.edit'   , 'uses' => 'StaffController@edit']);
    Route::patch('manager/staff/{id}'   , ['as' => 'backstage.manager.staff.update' , 'uses' => 'StaffController@update']);
    Route::post('manager/staff'         , ['as' => 'backstage.manager.staff.store'  , 'uses' => 'StaffController@store']);
    Route::delete('manager/staff/{id}'  , ['as' => 'backstage.manager.staff.destroy', 'uses' => 'StaffController@destroy']);
});