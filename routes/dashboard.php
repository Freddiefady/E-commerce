<?php

use App\Http\Controllers\Dashboard\Admins\AdminController;
use App\Http\Controllers\Dashboard\Auth\AuthController;
use App\Http\Controllers\Dashboard\Auth\Password\ForgetPasswordController;
use App\Http\Controllers\Dashboard\Auth\Password\ResetPasswordController;
use App\Http\Controllers\Dashboard\Categories\CategoryController;
use App\Http\Controllers\Dashboard\Roles\RoleController;
use App\Http\Controllers\Dashboard\WelcomeController;
use App\Http\Controllers\Dashboard\Worlds\WorldController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale() . '/dashboard',
        'as' => 'dashboard.',
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {
        /////////////// Authentication
        Route::prefix('login')->controller(AuthController::class)->group(function () {
            Route::get('/', 'ShowFormLogin');
            Route::post('/', 'login')->name('login');
            Route::post('logout', 'logout')->name('logout');
        });
        ///////////// Forget Authentication
        Route::controller(ForgetPasswordController::class)->name('password.')->group(function () {
            Route::get('email-verify', 'index')->name('forget');
            Route::post('verify', 'verifyEmail')->name('email');
            Route::get('send-otp/{email}', 'sendOtp')->name('send.otp');
            Route::post('verify-otp', 'verifyOtp')->name('verify.otp');
        });
        ///////////// Reset Authentication
        Route::prefix('reset-password')->controller(ResetPasswordController::class)->name('reset.password.')->group(function () {
            Route::get('/{email}', 'resetPasswordShow');
            Route::post('/', 'resetPasswordUpdate')->name('post');
        });
        ///////////// protected methods
        Route::group(['middleware' => 'auth:admin'], function () {
            Route::get('welcome', [WelcomeController::class, 'index'])->name('Welcome');
            Route::resource('roles', RoleController::class)->middleware('can:roles');
            Route::resource('admins', AdminController::class)->middleware('can:admins');
            Route::get('admins/{id}/status', [AdminController::class, 'ChangeStatus'])->name('admins.status');

            Route::group(['middleware' => 'can:global_shipping', 'controller' => WorldController::class], function () {
                // Routes countries
                Route::prefix('countries')->name('countries.')->group(function(){
                    Route::get('/', 'getCountries')->name('index');
                    Route::get('{country_id}/governorates', 'getGovByCountry')->name('gov.index');
                    Route::get('{gov_id}/cities', 'getCitiesByGovId')->name('cities.index');
                    Route::get('change_status/{country_id}', 'changeStatus')->name('change.status');
                });
                // Routes governorates
                Route::prefix('governorates/')->name('governo.')->group(function(){
                    Route::get('change_status/{governo_id}', 'changeGovernoStatus')->name('change.status');
                    Route::put('shipping-price', 'changeShippingPrice')->name('shipping.price');
                });
            });
            // Routes categories
            Route::group(['middleware' => 'can:categories', 'controller' => CategoryController::class], function () {
                Route::resource('categories', CategoryController::class);
                Route::get('categories-all', 'getCategories')->name('categories.all');
                Route::get('category-status/{id}', 'changeStatus')->name('categories.change.status');
            });
        });

    }
);
