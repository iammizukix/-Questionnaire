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
Route::get('index','IndexController@index');
Route::post('confirm','IndexController@post');
Route::get('system/answer/index','AnswersController@index');
Route::post('system/answer/index','AnswersController@selectDelete');
Route::get('system/answer/{id?}','AnswersController@show');
Route::post('system/answer/{id?}','AnswersController@remove');

// Route::post('result','IndexController@result_post'); // add by inst
Route::post('result','IndexController@create'); // add by inst

// Auth::routes();
Route::get('system', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('system', 'Auth\LoginController@login');
Route::post('system/logout', 'Auth\LoginController@logout')->name('logout');

Route::get('system/register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('system/register', 'Auth\RegisterController@register');

Route::get('system/password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('system/password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('system/password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('system/password/reset', 'Auth\ResetPasswordController@reset');

if (env('APP_ENV') === 'production') {
     URL::forceScheme('https');
     }
