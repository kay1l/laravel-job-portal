<?php

use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Frontend\CandidateDashboardController;
use App\Http\Controllers\Frontend\CompanyDashboardController;
use App\Http\Controllers\Frontend\CompanyProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index']);

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// Company Routes
Route::group([
    'middleware' => ['auth', 'verified', 'user.role:company'],
     'prefix'=> 'company',
     'as' => 'company.'
],function(){

    Route::get('/dashboard',[CompanyDashboardController::class, 'index'])->name('dashboard');

   /*** Dashboard Profile Route*/
   Route::get('/profile', [CompanyProfileController::class, 'index'])->name('profile');
   Route::post('/profile/company-info', [CompanyProfileController::class, 'updateCompanyInfo'])->name('profile.company.info');
   Route::post('/profile/founding-info', [CompanyProfileController::class, 'updateFoundingInfo'])->name('profile.founding.info');
   Route::post('/profile/account-info', [CompanyProfileController::class, 'updateAccountInfo'])->name('profile.account.info');
   Route::post('/profile/password-update', [CompanyProfileController::class, 'updatePassword'])->name('profile.password.update');
});

// Candidate Routes
Route::group([
     'middleware' => ['auth', 'verified', 'user.role:candidate'],
    'prefix'=> 'candidate',
    'as' => 'candidate.'
],function(){

    Route::get('/dashboard', [CandidateDashboardController::class, 'index'])->name('dashboard');


});


