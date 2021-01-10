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

Route::get('/', function () {
    return redirect('login');
});

Auth::routes(['register' => false]);

Route::group([
    'middleware' => ['auth']
], function() {
    Route::resource('shifts', 'ShiftController');
    Route::put('/shifts/{shift}/publish', 'ShiftController@publish')->name('shifts.publish');
    Route::get('/shifts/today', 'ShiftController@show')->name('home');
});
