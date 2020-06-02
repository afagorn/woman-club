<?php

use Illuminate\Support\Facades\Route;

//API
Route::group([
    'prefix' => 'api',
    'as' => 'api.',
    'namespace' => 'API'
], function () {
    //Работа с заказами
    Route::post('/order/create', 'OrderController@create');

    //Уведомления яндекса об оплате
    Route::post('/payment/yandex-notification', 'PaymentController@yandexNotification');
});

//Site
Route::group([
    'as' => 'site.',
    'namespace' => 'Site'
], function () {
    Route::get('/', 'HomeController@index')->name('home');

    //Страница благодарности после успешной покупки
    Route::get('/success-payment', 'HomeController@successPayment')->name('successPayment');

    //Яндекс оплата уведомления
    Route::post('/yandex-payment', 'YandexPaymentController@index')->name('yandexPayment');
});

//Админка
Route::group([
    'prefix' => 'admin',
    'as' => 'admin.',
    'namespace' => 'Admin'
], function () {
    Route::get('/', 'HomeController@index')->name('home');

    Route::resource('products', 'ProductController');

    Route::resource('order', 'OrderController');

    Route::resource('customer', 'User\CustomerController');
});

Auth::routes();

Route::group([
    //'middleware' => 'auth'
    ], function () {
	Route::get('table-list', function () {
		return view('pages.table_list');
	})->name('table');

	Route::get('typography', function () {
		return view('pages.typography');
	})->name('typography');

	Route::get('icons', function () {
		return view('pages.icons');
	})->name('icons');

	Route::get('map', function () {
		return view('pages.map');
	})->name('map');

	Route::get('notifications', function () {
		return view('pages.notifications');
	})->name('notifications');

	Route::get('rtl-support', function () {
		return view('pages.language');
	})->name('language');

	Route::get('upgrade', function () {
		return view('pages.upgrade');
	})->name('upgrade');
});

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
});

