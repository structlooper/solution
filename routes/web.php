<?php

use Illuminate\Support\Facades\Route;

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


route::get('/','IndexController@index')->name('home');
route::get('login','IndexController@loginPage')->name('loginPage');
route::get('signup','IndexController@signupPage')->name('signupPage');
route::post('register','IndexController@register')->name('register');
route::post('signin','IndexController@login')->name('login');
route::get('profiles','IndexController@profiles')->name('profiles');
route::get('ProfileApprove/{id}','IndexController@ProfileApprove')->name('ProfileApprove');
route::get('logout' , function(){
    Session::forget('logginedUser');
    return redirect()->route('home');
})->name('logout');
route::get('postPage','IndexController@postPage')->name('postPage');
route::get('postPage/add','IndexController@postPageAdd')->name('postPageAdd');
route::post('post','IndexController@post')->name('post');
route::get('postFeed','IndexController@postFeed')->name('postFeed');
route::get('postFeed/{id}','IndexController@postFeedByUser')->name('postbyUser');