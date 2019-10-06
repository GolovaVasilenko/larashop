<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('user/index', 'Shop\User\MainController@index')->name('profile');

/* Admin panel */
Route::group(['middleware' => ['status', 'auth']], function() {
    $groupData = [
        'namespace' => 'Shop\Admin',
        'prefix' => 'admin'
    ];

    Route::group($groupData, function() {
        Route::resource('index', 'MainController')
            ->names('shop.admin.index');

        Route::resource('orders', 'OrderController')
            ->names('shop.admin.orders');
        Route::post('orders/ajaxData', 'OrderController@ajaxData')
            ->name('shop.admin.orders.ajax');
    });
});
