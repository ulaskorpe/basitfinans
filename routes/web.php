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





//Route::group(['prefix'=>'admin-panel'],function(){
Route::get('/', 'HomeController@index')->name('home');

Route::group(['prefix'=>'muhasebe-vergi'],function (){

    Route::get('/stopaj-hesaplama','HomeController@stopajHesaplama')->name('stopaj-hesaplama');
    Route::get('/amortisman','HomeController@amortisman')->name('amortisman');
    Route::get('/amortisman-inner/{a_orani}/{a_yontemi}/{tutar}','HomeController@amortismanInner')->name('amortisman-inner');
});

Route::group(['prefix'=>'admin-panel'],function (){


    Route::post('/forget-pw','AdminHomeController@forgetPw')->name('forget-pw');
    Route::get('/check_image/{image}','HomeController@checkImage')->name('check_image');
    Route::get('/email-exists-admin/{email}/{id?}','AdminHomeController@emailExistsAdmin')->name('email-exists-admin');
    Route::get('/email-exists-client/{email}/{id?}','AdminHomeController@emailExistsClient')->name('email-exists-client');

    Route::post('/logout','AdminHomeController@logout')->name('logout');
    Route::get('/login','AdminHomeController@login')->name('login');
    Route::post('/login','AdminHomeController@login')->name('login-post');

    Route::group(['middleware'=>\App\Http\Middleware\checkAdmin::class],function (){
        Route::get('/', 'AdminHomeController@index')->name('home');
    Route::get('/get-pic','AdminHomeController@getPic')->name('get-pic');
    Route::get('/generate-pw','AdminHomeController@generatePw')->name('generate-pw');
    Route::get('/profile','AdminHomeController@profile')->name('profile');
    Route::post('/profile','AdminHomeController@profile')->name('profile-post');
    Route::get('/update-password','AdminHomeController@updatePassword')->name('update-password');
    Route::post('/update-password','AdminHomeController@updatePassword')->name('update-password-post');
    Route::get('/settings','AdminHomeController@updateSettings')->name('settings');
    Route::post('/settings','AdminHomeController@updateSettings')->name('settings-post');


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








