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

Route::group(['prefix' => 'admin'], function () {
  Route::get('/login', 'AdminAuth\LoginController@showLoginForm')->name('admin.login');
  Route::post('/login', 'AdminAuth\LoginController@login');
  Route::get('/logout', 'AdminAuth\LoginController@logout')->name('admin.logout');

  Route::get('/register', 'AdminAuth\RegisterController@showRegistrationForm')->name('admin.register');
  Route::post('/register', 'AdminAuth\RegisterController@register');

  Route::post('/password/email', 'AdminAuth\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.request');
  Route::post('/password/reset', 'AdminAuth\ResetPasswordController@reset')->name('admin.password.email');
  Route::get('/password/reset', 'AdminAuth\ForgotPasswordController@showLinkRequestForm')->name('admin.password.reset');
  Route::get('/password/reset/{token}', 'AdminAuth\ResetPasswordController@showResetForm');

//  pages ---------------------------------------
    Route::get('/rank/{id}','Admin\AdminController@rank');
    Route::get('/clients','Admin\AdminController@clients');
    Route::post('/search','Admin\AdminController@search');
});

Route::group(['prefix' => 'func'], function () {
    Route::get('/generate', 'testController@generateCode');
    Route::get('/rank', 'testController@promoteReg');
    Route::get('/remove', 'testController@removeNode');
    Route::get('/promoteThree', 'testController@promoteThree');
    Route::get('/downliners', 'testController@linears');
    Route::get('/hello', 'testController@hello');
});

Route::get('test', function (){
    return \Illuminate\Support\Facades\Hash::make('password');
});
