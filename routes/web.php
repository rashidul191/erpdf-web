<?php

use App\Http\Controllers\HomeController;
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

// Dynamic Menu Page Content
Route::get('/{slug}', [PageViewController::class, 'page'])->name('page.index');

Route::post('/contact-form-message', [\App\Http\Controllers\ContactFormMessageController::class, 'store'])->name('contact-form-message.store');

/* Blog Routes */
Route::get('/blog/{id}/{slug}', [PageViewController::class, 'blogDetails'])->name('blog.show');
Route::post('/blog-comment', [PageViewController::class, 'blogCommentStore'])->name('blog.comment.store');
Route::get('/blog-search', [PageViewController::class, 'blogSearch'])->name('blog.search');

Route::get('/team-category/{id}/{slug}', [PageViewController::class, 'teamCategory'])->name('team-category.show');

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
