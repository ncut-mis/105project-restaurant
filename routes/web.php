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

/*餐廳後台*/
Route::group(['prefix' => 'backstage'], function() {
    Route::get('/home'                   , 'StaffController@login2')->name('backstage.dashboard.index');
    /*經理-post*/
    Route::get('manager/post'           , 'PostController@index')->name('backstage.manager.post.index');
    Route::get('manager/post/create'    , 'PostController@create')->name('backstage.manager.post.create');
    Route::get('manager/post/{id}/edit' , 'PostController@edit')->name('backstage.manager.post.edit');
    Route::patch('manager/post/{id}'    , 'PostController@update')->name('backstage.manager.post.update');
    Route::post('manager/post'          , 'PostController@store')->name('backstage.manager.post.store');
    Route::delete('manager/post/{id}'   , 'PostController@destroy')->name('backstage.manager.post.destroy');

    /*經理-staff*/
    Route::get('manager/staff'           , 'StaffController@index')->name('backstage.manager.staff.index');
    Route::get('manager/staff/create'    , 'StaffController@create')->name('backstage.manager.staff.create');
    Route::get('manager/staff/{id}/edit' , 'StaffController@edit')->name('backstage.manager.staff.edit');
    Route::patch('manager/staff/{id}'    , 'StaffController@update')->name('backstage.manager.staff.update');
    Route::post('manager/staff'          , 'StaffController@store')->name('backstage.manager.staff.store');
    Route::delete('manager/staff/{id}'   , 'StaffController@destroy')->name('backstage.manager.staff.destroy');

    /*經理-coupon*/
    Route::get('manager/coupon'          , 'CouponController@index')->name('backstage.manager.coupon.index');
    Route::get('manager/coupon/create'   , 'CouponController@create')->name('backstage.manager.coupon.create');
    Route::get('manager/coupon/{id}/edit', 'CouponController@edit')->name('backstage.manager.coupon.edit');
    Route::patch('manager/coupon/{id}'   , 'CouponController@update')->name('backstage.manager.coupon.update');
    Route::post('manager/coupon'         , 'CouponController@store')->name('backstage.manager.coupon.store');
    Route::delete('manager/coupon/{id}'  , 'CouponController@destroy')->name('backstage.manager.coupon.destroy');

    /*經理-table*/
//    Route::get('manager/table'           , 'TableController@index')->name('backstage.manager.table.index');
//    Route::get('manager/table/create'    , 'TableController@create')->name('backstage.manager.table.create');
//    Route::get('manager/table/{id}/edit' , 'TableController@edit')->name('backstage.manager.table.edit');
//    Route::patch('manager/table/{id}'    , 'TableController@update')->name('backstage.manager.table.update');
//    Route::post('manager/table'          , 'TableController@store')->name('backstage.manager.table.store');
//    Route::delete('manager/table/{id}'   , 'TableController@destroy')->name('backstage.manager.table.destroy');

/*-------------------------------------------------------------------------------------------------------------------------------*/

    /*主廚-家*/
    Route::get('chef/home'          , ['as' => 'backstage.chef.home'  , 'uses' => 'KitchenController@index']);

    /*主廚-餐點管理*/
    Route::get('chef/meal'          , ['as' => 'backstage.chef.meal.index'  , 'uses' => 'MealController@index']);
    Route::get('chef/meal/create'   , ['as' => 'backstage.chef.meal.create' , 'uses' => 'MealController@create']);
    Route::get('chef/meal/{id}/edit', ['as' => 'backstage.chef.meal.edit'   , 'uses' => 'MealController@edit']);
    Route::patch('chef/meal/{id}'   , ['as' => 'backstage.chef.meal.update' , 'uses' => 'MealController@update']);
    Route::post('chef/meal'         , ['as' => 'backstage.chef.meal.store'  , 'uses' => 'MealController@store']);
    Route::delete('chef/meal/{id}'  , ['as' => 'backstage.chef.meal.destroy', 'uses' => 'MealController@destroy']);

    /*主廚-出餐管理*/
    Route::get('chef/rcveod' , ['as' => 'backstage.chef.order.index' , 'uses' => 'OrderController@index']);
    Route::get('chef/rcveod/{id}' , ['as' => 'backstage.chef.detail.index' , 'uses' => 'DetailController@index']);
    Route::patch('chef/rcveod/{id}/{deid}' , ['as' => 'backstage.chef.detail.update' , 'uses' => 'DetailController@update']);

/*-------------------------------------------------------------------------------------------------------------------------------*/

    /*櫃台index*/
    Route::get('/counter/index', ['as' => 'counter.login.index' , 'uses' => 'CounterController@index']);
    Route::get('/counter/history/index', ['as' => 'counter.history.index' , 'uses' => 'CounterController@HistoryIndex']);
    Route::get('/counter/dining/index', ['as' => 'counter.dining.index' , 'uses' => 'CounterController@DiningIndex']);
    Route::get('/counter/booking/index', ['as' => 'counter.booking.index' , 'uses' => 'CounterController@BookingIndex']);

    /*櫃台booking細部*/
    Route::get('/restaurant/seat/update', ['as' => 'restaurant.seat.update' , 'uses' => 'TableController@update']);
    Route::get('/restaurant/{restaurant}/table', ['as' => 'restaurant.table.index' , 'uses' => 'TableController@index']);
    Route::get('/restaurant/{restaurant}/table/check',['as'=>'restaurant.table.check','uses'=>'TableController@check']);
    Route::get('/restaurant/{restaurant}/people/check',['as'=>'restaurant.people.check','uses'=>'TableController@PeopleCheck']);
    Route::get('/restaurant/{restaurant}/member/check',['as'=>'restaurant.member.check','uses'=>'TableController@MemberCheck']);
    Route::patch('/restaurant/{restaurant}/customer/check',['as'=>'restaurant.customer.check','uses'=>'TableController@CustomerCheck']);
});











//測試
Route::get('555', function () {
    return view('/test');
});


//掃描QR頁面
Route::get('scanning', function () {
    return view('/scanning');
});