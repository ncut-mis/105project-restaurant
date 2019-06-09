<?php
ini_set("display_errors", "On");
error_reporting(E_ALL & ~E_NOTICE);
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

//Route::get('restaurant/{id}' ,['as' => 'restaurant{id}.staffs' , 'uses' => 'HomeController@staff']);

//Route::get('restaurant/{id}/staff' ,['as' => 'restaurant.staffs.chose' , 'uses' => 'HomeController@chose']);

Route::get('login/{id}' ,['as' => 'restaurant{id}.staffs.login' , 'uses' => 'StaffController@login']);

/*登出及登入*/
Auth::routes();
Route::get('logout', 'Auth\LoginController@logout');

/*餐廳後台*/
Route::group(['prefix' => 'backstage'], function() {
    Route::get('/manager/home'                   , 'StaffController@login2')->name('backstage.manager.index');

    /*基本資料*/
    Route::get('/information'           , 'RestaurantController@index')->name('backstage.manager.information.index');
    Route::get('/information/{id}/edit' , 'RestaurantController@edit')->name('backstage.manager.information.edit');
    Route::patch('/information/{id}'    , 'RestaurantController@update')->name('backstage.manager.information.update');

    /*經理-post*/
    Route::get('/post'           , 'PostController@index')->name('backstage.manager.post.index');
    Route::get('/post/create'    , 'PostController@create')->name('backstage.manager.post.create');
    Route::get('/post/{id}/edit' , 'PostController@edit')->name('backstage.manager.post.edit');
    Route::patch('/post/{id}'    , 'PostController@update')->name('backstage.manager.post.update');
    Route::post('/post'          , 'PostController@store')->name('backstage.manager.post.store');
    Route::delete('/post/{id}'   , 'PostController@destroy')->name('backstage.manager.post.destroy');

    /*經理-staff*/
    Route::get('/staff'           , 'StaffController@index')->name('backstage.manager.staff.index');
    Route::get('/staff/create'    , 'StaffController@create')->name('backstage.manager.staff.create');
    Route::get('/staff/{id}/edit' , 'StaffController@edit')->name('backstage.manager.staff.edit');
    Route::patch('/staff/{id}'    , 'StaffController@update')->name('backstage.manager.staff.update');
    Route::post('/staff'          , 'StaffController@store')->name('backstage.manager.staff.store');
    Route::delete('/staff/{id}'   , 'StaffController@destroy')->name('backstage.manager.staff.destroy');

    /*經理-coupon*/
    Route::get('/coupon'          , 'CouponController@index')->name('backstage.manager.coupon.index');
    Route::get('/coupon/create'   , 'CouponController@create')->name('backstage.manager.coupon.create');
    Route::get('/coupon/{id}/edit', 'CouponController@edit')->name('backstage.manager.coupon.edit');
    Route::patch('/coupon/{id}'   , 'CouponController@update')->name('backstage.manager.coupon.update');
    Route::post('/coupon'         , 'CouponController@store')->name('backstage.manager.coupon.store');
    Route::delete('/coupon/{id}'  , 'CouponController@destroy')->name('backstage.manager.coupon.destroy');

    /*經理-coupon發送通知*/
    Route::get('/{id}/coupon-noti'          , 'CouponController@noti')->name('backstage.manager.coupon.noti');

    /*經理-table*/
    Route::get('/table'           , 'TableController@index_2')->name('backstage.manager.table.index');
    Route::get('/table/create'    , 'TableController@create')->name('backstage.manager.table.create');

    Route::get('/table/edit'      , 'TableController@edit')->name('backstage.manager.table.edit');
    Route::get('/table/store'      , 'TableController@store2')->name('backstage.manager.table.store2');

    Route::patch('/table/{id}'    , 'TableController@update_1')->name('backstage.manager.table.update');//

    Route::post('/table'          , 'TableController@store')->name('backstage.manager.table.store');
    Route::delete('/table/{id}'   , 'TableController@destroy')->name('backstage.manager.table.destroy');

    /*經理-餐廳token修改*/
    Route::get('token',['as'=>'backstage.manager.token.index','uses'=>'RestaurantController@tokenindex']);
    Route::get('token/{id}/edit',['as'=>'backstage.manager.token.edit','uses'=>'RestaurantController@tokenedit']);
    Route::patch('token/{id}',['as'=>'backstage.manager.token.update','uses'=>'RestaurantController@tokenupdate']);


    Route::get('/table/test' , 'TableController@test')->name('table.test');//





/*-------------------------------------------------------------------------------------------------------------------------------*/

    /*主廚-家*/
    Route::get('chef/home'          , ['as' => 'backstage.chef.home'  , 'uses' => 'KitchenController@index']);

    /*主廚-餐點管理*/
    Route::get('meal'          , ['as' => 'backstage.chef.meal.index'  , 'uses' => 'MealController@index']);
    Route::get('meal/create'   , ['as' => 'backstage.chef.meal.create' , 'uses' => 'MealController@create']);
    Route::get('meal/{id}/edit', ['as' => 'backstage.chef.meal.edit'   , 'uses' => 'MealController@edit']);
    Route::patch('meal/{id}'   , ['as' => 'backstage.chef.meal.update' , 'uses' => 'MealController@update']);
    Route::post('meal'         , ['as' => 'backstage.chef.meal.store'  , 'uses' => 'MealController@store']);
    Route::delete('meal/{id}'  , ['as' => 'backstage.chef.meal.destroy', 'uses' => 'MealController@destroy']);

    /*主廚-出餐管理*/
    Route::get('rcveod' , ['as' => 'backstage.chef.order.index' , 'uses' => 'OrderController@index']);
    Route::patch('rcveod/{id}' , ['as' => 'backstage.chef.order.update' , 'uses' => 'OrderController@update2']);

    /*主廚通知維護*/
    Route::get('chef/noti' , ['as' => 'backstage.chef.notify' , 'uses' => 'KitchenController@notify']);
    Route::patch('chef/noti/{id}' , ['as' => 'backstage.chef.notify.update' , 'uses' => 'KitchenController@notify_update']);
    /*firebase測試*/
    Route::get('firejava',['as'=>'backstage.chef.fire3','uses'=>'KitchenController@fire']);//firebase搭配javascript-fetch指令
    Route::get('firelara',['as'=>'backstage.chef.noti','uses'=>'KitchenController@noti']);//firebase搭配laravel-fcm套件的按鈕


/*-------------------------------------------------------------------------------------------------------------------------------*/

    /*櫃台index*/
    Route::get('/counter/index', ['as' => 'counter.login.index' , 'uses' => 'CounterController@index']);
    Route::get('/counter/history/index', ['as' => 'counter.history.index' , 'uses' => 'CounterController@HistoryIndex']);
    Route::get('/counter/dining/index', ['as' => 'counter.dining.index' , 'uses' => 'CounterController@DiningIndex']);
    Route::get('/counter/booking/index', ['as' => 'counter.booking.index' , 'uses' => 'CounterController@BookingIndex']);

    Route::get('/counter/check/index', ['as' => 'counter.check.index' , 'uses' => 'CounterController@CheckIndex']);


    /*櫃台通知維護*/
    Route::get('counter/noti' , ['as' => 'counter.notify' , 'uses' => 'CounterController@notify']);
    Route::patch('counter/noti/{id}' , ['as' => 'counter.notify.update' , 'uses' => 'CounterController@notify_update']);


    Route::get('/counter/dining/test', ['as' => 'counter.test' , 'uses' => 'CounterController@test']);


    //櫃台確認廚房出完餐後，點擊更新order狀態
    Route::patch('/counter/dining/index/{id}', ['as' => 'counter.check-kitchen' , 'uses' => 'OrderController@eating']);
    //結帳按鈕(前往結帳畫面&結帳)
    Route::get('/counter/checkout/{id}/edit', ['as' => 'counter.checkout' , 'uses' => 'CounterController@checkout']);
    Route::patch('/counter/checkout/{id}/', ['as' => 'counter.checkouting' , 'uses' => 'CounterController@checkouting']);

    //一起更新table狀態(確認中->出餐中)&&更新order狀態(未用餐->出餐中)
    Route::patch('/test2/{id}/', ['as' => 'counter.plm' , 'uses' => 'CounterController@plm']);
    //
    /*櫃台booking細部*/
    Route::get('/restaurant/seat/update', ['as' => 'restaurant.seat.update' , 'uses' => 'TableController@update']);
    Route::get('/restaurant/{restaurant}/table', ['as' => 'restaurant.table.index' , 'uses' => 'TableController@index']); //2
    Route::get('/restaurant/{restaurant}/table/check',['as'=>'restaurant.table.check','uses'=>'TableController@check']);//3
    Route::get('/restaurant/{restaurant}/people/check',['as'=>'restaurant.people.check','uses'=>'TableController@PeopleCheck']);  //1
    Route::get('/restaurant/{restaurant}/member/check',['as'=>'restaurant.member.check','uses'=>'TableController@MemberCheck']); //4-1
    Route::patch('/restaurant/{restaurant}/customer/check',['as'=>'restaurant.customer.check','uses'=>'TableController@CustomerCheck']);//4
    Route::get('/restaurant/{restaurant}/member/check/store',['as'=>'restaurant.member.store','uses'=>'MemberCheckController@store']);//4-2

    /*櫃台結帳*/
    Route::get('/customer/checkout/index',['as'=>'customer.checkout.index','uses'=>'CheckOutController@index']);
});











//測試
Route::get('555', function () {
    return view('/test');
});

//seat
Route::get('666',function () {
    return view('/backstage/manager/seat/seat');
});

//掃描QR頁面
Route::get('scanning', function () {
    return view('/scanning');
});