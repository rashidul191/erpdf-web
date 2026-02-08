<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\FrontEnd\CartController;
use App\Http\Controllers\FrontEnd\CheckOutController;
use App\Http\Controllers\FrontEnd\HomeController;
use App\Http\Controllers\FrontEnd\ProductController;
use App\Http\Controllers\FrontEnd\ViewCartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PageViewController;
use Illuminate\Http\Request;
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

Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::redirect('/home', '/');

Route::get('/offers', [PageViewController::class, 'offerPage'])->name('offers-page');

Route::middleware(['auth.multi', 'no-cache'])->group(function () {
    Route::get('/dashboard', \App\Http\Controllers\DashboardController::class)->middleware(['auth'])->name('dashboard');

    Route::resource('password-update', \App\Http\Controllers\PasswordUpdateController::class)
        ->only(['create', 'store']);
    Route::resource('profile-update', \App\Http\Controllers\ProfileUpdateController::class)
        ->only(['create', 'store']);
    
    Route::resource('password-update', \App\Http\Controllers\PasswordUpdateController::class)
        ->only(['create', 'store']);
    Route::resource('profile-update', \App\Http\Controllers\ProfileUpdateController::class)
        ->only(['create', 'store']);

    Route::prefix('affiliate')->name('affiliate.')->group(function () {
        Route::get('list', \App\Http\Controllers\Affiliate\ReferralListController::class)->name('list.index');
        Route::get('tree', \App\Http\Controllers\Affiliate\ReferralTreeController::class)->name('tree.index');
    });
});

Route::get('portal/{user}', \App\Http\Controllers\PortalController::class)->name('portal');
Route::middleware(['no-cache'])->group(function () {
    require __DIR__ . '/auth.php';
});

require __DIR__ . '/admin.php';
