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
    Route::get('home', 'HomeController@index')->name('home');
    Route::prefix('shifts')->name('shifts.')->group(function() {
        Route::get('index', 'ShiftController@index')->name('index');
        Route::post('/', 'ShiftController@store')->name('store');
    });
});
