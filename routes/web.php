<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/* Admin panel */
Route::group(['middleware' => ['status', 'auth']], function() {
    $groupData = [
        'namespace' => 'Shop\Admin',
        'prefix' => 'admin'
    ];

    Route::group($groupData, function() {
        Route::resource('index', 'MainController');
    });
});
