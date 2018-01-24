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

//Route::get('/', function () {return view('welcome');});




Route::namespace('Signup')->as('signup.')->group(function () {

    // loginしていない時に見れるView
    Route::middleware('guest:user')->group(function () {
        // ユーザ登録
        Route::get ('/', 'SignupController@index')->name('index');
        Route::post('/', 'SignupController@postIndex');
        Route::get ('confirm', 'SignupController@confirm')->name('confirm');
        Route::post('confirm', 'SignupController@postConfirm');
    });
});


// --- ユーザ ---

// loginしないでも見れるView
Route::prefix('user')->namespace('User')->as('user.')->group(function () {

    Route::middleware('guest:user')->group(function () {
        Route::get('login', 'UserController@login')->name('login');
    });

    // login後に見れるView
    Route::middleware('auth:user')->group(function () {
        // thanks画面
        Route::get('thanks', 'UserController@thanks')->name('thanks');
        // logout
        Route::get('logout', 'UserController@logout')->name('logout');
        // top画面
        Route::get('', 'UserController@top')->name('top');
    });

});

// --- 管理者 ---

Route::prefix('admin')->namespace('Admin')->as('admin.')->group(function (){

    // loginしていない時に見れるView
    Route::middleware('guest:admin')->group(function (){
        // login
        Route::get ('login', 'LoginController@showLoginForm')->name('login');
        Route::post('login', 'LoginController@login');
    });

    // login後に見れるView
    Route::middleware('auth:admin')->group(function (){
        // logout
        Route::get ('logout','LoginController@logout')->name('logout');
        // top
        Route::get ('', 'AdminController@top')->name('top');
        // メッセージ関係
        Route::get ('message', 'MessageController@index')->name('message.index');
        Route::get ('message/create', 'MessageController@create')->name('message.create');
        Route::post('message/create', 'MessageController@store');
        Route::get ('message/edit/{message}', 'MessageController@edit')->name('message.edit');
        Route::post('message/edit/{message}', 'MessageController@update');
        // ユーザ一関係
        Route::get ('user', 'UserController@index')->name('user.index');

    });

});

