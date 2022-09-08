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
        Route::get('/users/edit/{id}', [App\Http\Controllers\Admin\Admincontroller::class, 'edit'])->name('admin.users.edit');
        Route::post('/users/update/{id}', [App\Http\Controllers\Admin\Admincontroller::class, 'update'])->name('admin.users.update');
    });

    //user Routes;
    Route::group(['middleware' => ['IsUser'], 'prefix' => 'user'], function () {
        Route::get('/proudcts', [App\Http\Controllers\ProductController::class, 'index'])->name('proudcts.index');
    });
});


Route::get('/logout', [App\Http\Controllers\HomeController::class, 'logout'])->name('logout');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('logout');
