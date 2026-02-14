<?php

use App\Http\Controllers\FrontEnd\HomeController;
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

Route::post('/contact-form-message', [\App\Http\Controllers\ContactFormMessageController::class, 'store'])->name('contact-form-message.store');

/* Page Routes */
Route::get('/about-us', [PageViewController::class, 'aboutPage'])->name('about.index');
Route::get('/blog', [PageViewController::class, 'blogPage'])->name('blog.index');
Route::get('/gallery', [PageViewController::class, 'galleryPage'])->name('gallery.index');
Route::get('/contact-us', [PageViewController::class, 'contactPage'])->name('contact.index');


/* Blog Routes */
Route::get('/blog/{id}/{slug}', [PageViewController::class, 'blogDetails'])->name('blog.show');
Route::post('/blog-comment', [PageViewController::class, 'blogCommentStore'])->name('blog.comment.store');
Route::get('/blog-search', [PageViewController::class, 'blogSearch'])->name('blog.search');

/* Room Routes */
Route::get('/room/{id}/{slug}', [PageViewController::class, 'roomDetails'])->name('room.show');
Route::get('/room-category/{id}/{slug}', [PageViewController::class, 'roomCategory'])->name('room-category.show');
Route::post('/room-comment', [PageViewController::class, 'roomCommentStore'])->name('room.comment.store');
Route::get('/room-search', [PageViewController::class, 'roomSearch'])->name('room.search');

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
