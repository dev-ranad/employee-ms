<?php

use App\Http\Controllers\Employee\Authentication\EnterController;
use App\Http\Controllers\Employee\IndexController;
use App\Http\Controllers\Employee\Manage\EmployeeController;
use App\Http\Controllers\Employee\System\SettingController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Employee Routes
|--------------------------------------------------------------------------
|
| Here is where you can register employee routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "employee" middleware group. Now create something great!
|
*/

Route::get('/clear-cache', function () {
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('route:clear');
    Artisan::call('view:clear');
    return redirect()->back();
})->name('clear.cache');

Route::controller(EnterController::class)->group(function () {
    Route::middleware('employee.guest')->group(function () {
        Route::get('/enter', 'enter')->name('enter');
        Route::post('/enter-request', 'login')->name('enter.request');

        Route::get('/login/google/redirect',  'redirectToGoogle')->name('redirect.to.google');
        Route::get('/login/google/callback', 'handleGoogleCallback')->name('callback.to.google');
    });
});
Route::middleware('employee.auth')->group(function () {
    Route::controller(IndexController::class)->group(function () {
        Route::get('/dashboard', 'get_index')->name('index');
    });


    Route::controller(EmployeeController::class)->group(function () {
        Route::get('/', 'get_index')->name('get_all');
        Route::get('/present-employee', 'get_present')->name('get_present');
        Route::get('/absence-employee', 'get_absence')->name('get_absence');
        Route::get('/details/{id}', 'get_data_details')->name('get_data_details');

        Route::get('/attandance', 'get_attandance_show')->name('get_attandance_show');
        Route::post('/take-attandance', 'take_attandance')->name('take.attandance');
    });


});

Route::controller(EnterController::class)->name('employee.')->group(function () {
    Route::middleware('auth:employee')->group(function () {
        Route::get('/exit', 'logout')->name('exit');
    });
});
