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
    return view('welcome');
});

Auth::routes(
    [
        'register' => false,
    ]
);

Route::group(['middleware' => ['auth']], function () {

    Route::group(['middleware' => ['IsAdmin'], 'prefix' => 'admin'], function () {
        Route::get('/users', [App\Http\Controllers\Admin\Admincontroller::class, 'index'])->name('admin.users.index');
    });

    //user Routes;
    Route::group(['middleware' => ['IsUser'], 'prefix' => 'user'], function () {
        Route::get('/test', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    });
});


Route::get('/logout', [App\Http\Controllers\HomeController::class, 'logout'])->name('logout');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('logout');
