<?php

use App\Http\Controllers\Admin\Authentication\EnterController;
use App\Http\Controllers\Admin\IndexController;
use App\Http\Controllers\Admin\Manage\EmployeeController;
use App\Http\Controllers\Admin\System\SettingController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register admin routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "admin" middleware group. Now create something great!
|
*/

Route::get('/clear-cache', function () {
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('route:clear');
    Artisan::call('view:clear');
    return redirect()->back();
})->name('clear.cache');

Route::controller(EnterController::class)->name('admin.')->group(function () {
    Route::middleware('admin.guest')->group(function () {
        Route::get('/enter', 'enter')->name('enter');
        Route::post('/enter-request', 'login')->name('enter.request');
    });
});
Route::middleware('admin.auth')->name('admin.')->group(function () {
    Route::controller(IndexController::class)->group(function () {
        Route::get('/dashboard', 'get_index')->name('index');
    });


    Route::controller(EmployeeController::class)->prefix('employee')->name('employee.')->group(function () {
        Route::get('/', 'get_index')->name('get_all');
        Route::get('/active', 'get_active')->name('get_active');
        Route::get('/banned', 'get_banned')->name('get_banned');
        Route::get('/details/{id}', 'get_data_details')->name('get_data_details');

        Route::get('/create', 'post_data_create')->name('post_data_create');
        Route::post('/save', 'post_data_save')->name('post_data_save');

        Route::get('/all-employee', 'get_attandance')->name('get_attandance');
        Route::get('/present-employee', 'get_present')->name('get_present');
        Route::get('/absence-employee', 'get_absence')->name('get_absence');
    });


});

Route::controller(EnterController::class)->name('admin.')->group(function () {
    Route::middleware('auth:admin')->group(function () {
        Route::get('/exit', 'logout')->name('exit');
    });
});
