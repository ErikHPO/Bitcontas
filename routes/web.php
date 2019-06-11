<?php
Route::get('/', function () {
    return view('welcome');
});

Route::resource('contacts', 'ContactController');
//Route::apiResource('contacts', 'ContactController');
Auth::routes();

Route::resource('bills', 'BillsController');

Route::get('/payments/{payment}', 'PaymentsController@index')->name('payments');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('users/{user}',  ['as' => 'users.edit', 'uses' => 'UserController@edit']);
Route::patch('users/{user}/update',  ['as' => 'users.update', 'uses' => 'UserController@update']);

//Route::get('/bills','BillsController@index')->name('bills');

// Route::get('/bills/{bill}', 'BillsController@show')

// Route::post('/bills','BillsController@store')

// Route::get('/bills/{bill}/edit', 'BillsController@edit')

// Route::patch('/bills/{bill}', 'BillsController@update')

// Route::delete('/bills/{bill}', 'BillsController@destroy')

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
