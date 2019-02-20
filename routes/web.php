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

Route::get('/',['as' => 'restaurant.index' , 'uses' => 'HomeController@index']);
Route::get('restaurant/{id}' ,['as' => 'restaurant{id}.staffs' , 'uses' => 'HomeController@staff']);

Route::get('restaurant/{id}/staff' ,['as' => 'restaurant.staffs.chose' , 'uses' => 'HomeController@chose']);

Route::get('login/{id}' ,['as' => 'restaurant{id}.staffs.login' , 'uses' => 'StaffController@login']);


/*登出及登入*/
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



//櫃台
Route::get('/counter/index', ['as' => 'counter.login.index' , 'uses' => 'CounterController@index']);







//測試
Route::get('555', function () {
    return view('/test');
});
Route::get('333', function () {
    return view('/backstage/counter/index');
});