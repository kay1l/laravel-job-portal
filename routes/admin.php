<?php

use App\Http\Controllers\admin\Auth\AuthenticatedSessionController;
use App\Http\Controllers\admin\Auth\NewPasswordController;
use App\Http\Controllers\admin\IndustryTypeController;
use App\Http\Controllers\admin\OrganizationTypeController;
use App\Http\Controllers\admin\CountryController;
use App\Http\Controllers\admin\Auth\PasswordResetLinkController;
use App\Http\Controllers\Admin\CityController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\StatesController;
use Illuminate\Support\Facades\Route;

Route::group( ['middleware' => ['guest:admin'], 'prefix' => 'admin', 'as' => 'admin.'],function () {

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
                ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
                ->name('password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
                ->name('password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
                ->name('admin.password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
                ->name('password.store');
});

Route::group (['middleware' => ['auth:admin'], 'prefix' => 'admin', 'as' => 'admin.'],function () {
    /** Dashboard Route */
    Route::get('dashboard', [DashboardController::class, 'index'] )->name('dashboard');

/** Industry Routes */
Route::resource('industry-types', IndustryTypeController::class);

/** Organization Routes */
Route::resource('organization-types', OrganizationTypeController::class);

/** Countries Routes */
Route::resource('countries', CountryController::class);

/** States Routes */
Route::resource('states', StatesController::class);

/** Cities Routes */
Route::resource('cities', CityController::class);









    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
                ->name('logout');
});
