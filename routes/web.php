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
    return view('auth.login');
});
Auth::routes();
Route::get ('/dashboard','HomeController@test');
Route::get  ('user','UserController@index');
Route::get  ('admin_login','AdminAuth\LoginController@showLoginForm');
Route::post ('admin_login','AdminAuth\LoginController@login');
Route::post ('admin_logout','AdminAuth\LoginController@logout');
Route::post ('admin_password/email','AdminAuth\ForgotPasswordController@sendResetLinkEmail');
Route::get  ('admin_password/reset','AdminAuth\ForgotPasswordController@showLinkRequestForm');
Route::post ('admin_password/reset','AdminAuth\ResetPasswordController@reset');
Route::get  ('admin_password/reset/{token} ','AdminAuth\ResetPasswordController@showResetForm');
// Route::get  ('user/create','Auth\RegisterController@showRegistrationForm');
Route::post ('user/register','AdminAuth\RegisterController@register');

Route::get('/monitoring-dashboard', 'AdminServiceController@dashboard');
Route::get('/merchant', 'MerchantController@index')->middleware('monitoring');
Route::post('/merchant/store', 'MerchantController@store')->middleware('monitoring');
Route::post('/merchant/update', 'MerchantController@update')->middleware('monitoring');
Route::post('/merchant/delete', 'MerchantController@delete')->middleware('monitoring');
Route::post('/service-point/delete', 'ServicePointController@delete');
Route::post('/user/delete', 'UserController@delete');
Route::post('/admin-services/delete', 'AdminServiceController@delete');

Route::group(['prefix'=>'merchant'], function(){
	Route::get('','MerchantController@index');
	Route::get('create', 'MerchantController@index')->middleware('monitoring');
	Route::post('store', 'MerchantController@store')->middleware('monitoring');
});

Route::group(['prefix'=>'service-point'], function(){
	Route::get('','ServicePointController@index')->middleware('monitoring');
	Route::get('create', 'ServicePointController@create')->middleware('monitoring');
	Route::post('create', 'ServicePointController@store')->middleware('monitoring');
	Route::get('{servicePoint}/edit', 'ServicePointController@edit')->name('service-point.edit')->middleware('monitoring');
	Route::post('{servicePoint}/update', 'ServicePointController@update')->middleware('monitoring');
});

Route::group(['prefix'=>'user'], function(){
	Route::get('','UserController@index')->middleware('monitoring');
	Route::get('create','Auth\RegisterController@showRegistrationForm')->middleware('monitoring');
	Route::get('{user}/edit','UserController@edit');
	Route::post('{user}/update','UserController@update')->middleware('monitoring');
});



Route::group(['prefix'=>'admin-services'], function(){
	Route::get('','AdminServiceController@index')->middleware('monitoring');
	Route::get('create','AdminServiceController@create')->middleware('monitoring');
	Route::post('create', 'AdminServiceController@store')->middleware('monitoring');
	Route::get('{adminService}/edit','AdminServiceController@edit')->middleware('monitoring');
	Route::post('{adminService}/update','AdminServiceController@update')->middleware('monitoring');
	Route::post('report','AdminServiceController@postRepost')->middleware('monitoring');
	Route::get('report','ServicePointLeaderController@report')->middleware('monitoring');
	Route::get('/schedule','AdminServiceController@schedule')->middleware('monitoring');
	Route::get('/completed','AdminServiceController@completed')->middleware('monitoring');
	Route::get('{adminService}/detail-completed','AdminServiceController@detailServicesCompleted')->middleware('monitoring');
});

Route::group(['prefix'=>'service-point-leader'], function(){
	Route::get('/assign-services','ServicePointLeaderController@index')->middleware('spl');
	Route::get('{servicepointleader}/edit','ServicePointLeaderController@edit')->middleware('spl');
	Route::post('{adminService}/update','ServicePointLeaderController@update')->middleware('spl');
	Route::get('schedule','ServicePointLeaderController@schedule')->middleware('spl');
	Route::get('done','ServicePointLeaderController@done')->middleware('spl');
	Route::get('schedule/{servicepointleader}/edit','ServicePointLeaderController@edit')->middleware('spl');
	Route::post('schedule/{servicepointleader}/update','ServicePointLeaderController@updateSchedule')->middleware('spl');
	Route::get('{servicepointleader}/check','ServicePointLeaderController@check')->middleware('spl');
	Route::post('{servicepointleader}/test','ServicePointLeaderController@updateWorkOrder')->middleware('spl');
	Route::get('{servicepointleader}/print-work-order','ServicePointLeaderController@printWorkOrder')->middleware('spl');
	Route::get('/completed','ServicePointLeaderController@completed')->middleware('spl');
	Route::get('{ServicePointLeader}/detail-completed','ServicePointLeaderController@detailServicesCompleted')->middleware('spl');
	Route::get('/dashboard','ServicePointLeaderController@dashboard')->middleware('spl');
	Route::get('/{servicepointleader}/edit-user','ServicePointLeaderController@editUser')->middleware('spl');
	Route::post('/{servicepointleader}/update-user','ServicePointLeaderController@updateUser')->middleware('spl');
	Route::get('report','ServicePointLeaderController@report')->middleware('spl');
	Route::post('report','ServicePointLeaderController@postRepost')->middleware('spl');
});

Route::group(['prefix'=>'engineer'], function(){
	Route::get('/services','EngineerController@index')->middleware('engineer');
	Route::get('/dashboard','EngineerController@dashboard')->middleware('engineer');
	Route::get('/detail','EngineerController@detail')->middleware('engineer');
	Route::get('{adminService}/work-order','EngineerController@workorder')->middleware('engineer');
	Route::post('{adminService}/work-orders','EngineerController@update')->middleware('engineer');
	Route::get('/services-done','EngineerController@servicesDone')->middleware('engineer');
	Route::get('{adminService}/done','EngineerController@detailServicesDone')->middleware('engineer');
	Route::get('{adminService}/completed','EngineerController@detailServicesCompleted')->middleware('engineer');
	Route::get('/services-completed','EngineerController@completed')->middleware('engineer');
	Route::get('/services-completed','EngineerController@completed')->middleware('engineer');
	Route::get('/{user}/edit','EngineerController@edit')->middleware('engineer');
	Route::post('/{user}/update','EngineerController@updateUser')->middleware('engineer');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/test', 'AdminServiceController@test');
