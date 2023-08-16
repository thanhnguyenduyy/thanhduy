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
Auth::routes();
// Route::get('/home', 'HomeController@index')->name('home');

// Route::get('/register', 'Auth\RegisterController@showRegistrationForm')->middleware('admin')->name('register');

Route::get('/', 'MembersController@index')->middleware('device.restriction')->name('members');

Route::prefix('members')->middleware('admin')->group(function () {
    // danh sách
    Route::get('/list', 'MembersController@list')->name('members.list');
    // thêm 
    Route::get('/create', 'MembersController@create')->name('members.create');
    Route::post('/store', 'MembersController@store')->name('members.store');
    // edit
    Route::get('/edit/{id}', 'MembersController@edit')->name('members.edit');
    Route::put('/update/{id}', 'MembersController@update')->name('members.update');
    // xoá
    // Route::get('/destroy/{id}', 'MembersController@destroy')->name('members.destroy');
    Route::get('/delete/{id}', 'MembersController@delete')->name('members.delete');
});

Route::prefix('results')->middleware('admin')->group(function () {
   // danh sách
   Route::get('/list', 'ResultsController@list')->name('results.list');
   // thêm
   Route::get('/create', 'ResultsController@create')->name('results.create');
   Route::post('/store', 'ResultsController@store')->name('results.store');
   // edit
   Route::get('/edit/{id}', 'ResultsController@edit')->name('results.edit');
   Route::put('/update/{id}', 'ResultsController@update')->name('results.update');
   // xoá
   Route::get('/destroy/{id}', 'ResultsController@destroy')->name('results.destroy');
});