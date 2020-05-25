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

//Auth::routes();


use App\Http\Middleware\checkuser;


Route::post('/logout','HomeController@logout')->name('logout');
Route::get('/login','HomeController@login')->name('login');
Route::post('/login','HomeController@login')->name('login-post');

Route::post('/forget-pw','HomeController@forgetPw')->name('forget-pw');
Route::get('/check_image/{image}','HomeController@checkImage')->name('check_image');
Route::get('/email-exists-admin/{email}/{id?}','HomeController@emailExistsAdmin')->name('email-exists-admin');
Route::get('/email-exists-client/{email}/{id?}','HomeController@emailExistsClient')->name('email-exists-client');

//Route::group(['prefix'=>'admin-panel'],function(){

Route::group(['prefix'=>'admin-panel'],function (){

    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/get-pic','HomeController@getPic')->name('get-pic');
    Route::get('/generate-pw','HomeController@generatePw')->name('generate-pw');
    Route::get('/profile','HomeController@profile')->name('profile');
    Route::post('/profile','HomeController@profile')->name('profile-post');
    Route::get('/update-password','HomeController@updatePassword')->name('update-password');
    Route::post('/update-password','HomeController@updatePassword')->name('update-password-post');
    Route::get('/settings','HomeController@updateSettings')->name('settings');
    Route::post('/settings','HomeController@updateSettings')->name('settings-post');


    Route::group(['prefix'=>'admins'],function(){
        Route::get('/','AdminController@index')->name('admin-index');
        Route::get('/admins-json','AdminController@adminsJson')->name('admins-json');
        Route::get('/create','AdminController@create')->name('admin-create');
        Route::post('/create','AdminController@create')->name('admin-create-post');

        Route::get('/update/{id}','AdminController@update')->name('admin-update');
        Route::post('/update','AdminController@update')->name('admin-update-post');

    });


    Route::group(['prefix'=>'clients'],function(){
        Route::get('/','ClientController@index')->name('client-index');
        Route::get('/admins-json','ClientController@clientsJson')->name('client-json');
        Route::get('/create','ClientController@create')->name('client-create');
        Route::post('/create','ClientController@create')->name('client-create-post');

        Route::get('/update/{id}/{active?}','ClientController@update')->name('client-update');
        Route::post('/update','ClientController@update')->name('client-update-post');

        Route::get('/delete/{id}','ClientController@delete')->name('client-delete');

        Route::group(['prefix'=>'executive'],function(){
            Route::get('/create/{client_id}','ClientController@createExecutive')->name('executive-create');
            Route::post('/create','ClientController@createExecutive')->name('executive-create-post');
            Route::get('/update/{id}','ClientController@updateExecutive')->name('executive-update');
            Route::post('/update','ClientController@updateExecutive')->name('executive-update-post');
            Route::get('/delete/{id}','ClientController@deleteExecutive')->name('executive-delete');
        });

    });


});



Route::post('/contact','HomeController@contactform')->name('contact');

Route::post('forget-password','HomeController@forgetPassword')->name('forget-pw-post');


Route::get('/home', function (){
    return redirect('/');
});

Route::get('/pfiles', "Common\File\FileController@getFile")->name('pfiles');//->middleware('auth')

//Route::get('/get_file', "Common\File\FileController@getCommonFile")->name('get_file');
Route::get('/get_file', "HomeController@getCommonFile")->name('get_file');

Route::get('/set_language/{lang?}','AppController@setLanguage')->name('set_language');

Route::get('/change_lang/{lang?}','AppController@setLanguage')->name('change_lang');








