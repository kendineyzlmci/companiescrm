<?php

Auth::routes();

Route::group(['prefix' => '/', 'namespace' => 'Backend', 'middleware' => 'auth'], function () {
    Route::get('/', 'DashboardController@index')->name('home');

    Route::group(['prefix' => 'users', 'as' => 'users.'], function () {
        Route::get('/list', 'UserController@index')->name('list');
        Route::get('/add', 'UserController@add')->name('add');
        Route::post('/create', 'UserController@store')->name('create');
        Route::post('/update/{id}', 'UserController@update')->name('update');
        Route::get('/detail/{id}', 'UserController@detail')->name('detail');
        Route::get('/edit/{id}', 'UserController@edit')->name('edit');
        Route::get('/delete/{id}', 'UserController@destroy')->name('delete');
    });

    Route::group(['prefix'=>'company','as'=>'company.'],function (){
       Route::get('/list','CompanyController@index')->name('list');
       Route::get('/create','CompanyController@create')->name('create');
       Route::post('/store','CompanyController@store')->name('store');
       Route::get('/show/{id}','CompanyController@show')->name('show');
       Route::get('/website/{id}','CompanyController@website')->name('website');
       Route::post('/update/{id}','CompanyController@update')->name('update');
       Route::get('/edit/{id}','CompanyController@edit')->name('edit');
       Route::get('/destroy/{id}','CompanyController@destroy')->name('destroy');
    });

    Route::group(['prefix'=>'address','as'=>'address.'],function (){
        Route::get('/create/{id}','CompanyAdressController@create')->name('create');
        Route::post('/store/{id}','CompanyAdressController@store')->name('store');
        Route::get('/edit/{id}','CompanyAdressController@edit')->name('edit');
        Route::post('/update/{id}','CompanyAdressController@update')->name('update');
        Route::get('/destroy/{id}','CompanyController@destroy')->name('destroy');
    });

    Route::group(['prefix'=>'person','as'=>'person.'],function (){
        Route::post('/store','PersonController@store')->name('store');
        Route::post('/update/{id}','PersonController@update')->name('update');
        Route::get('/destroy/{id}','PersonController@destroy')->name('destroy');
    });

});
