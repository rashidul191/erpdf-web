<?php

use App\Http\Controllers\Admin\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Admin\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Admin\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Admin\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Admin\Auth\NewPasswordController;
use App\Http\Controllers\Admin\Auth\PasswordResetLinkController;
use App\Http\Controllers\Admin\Auth\VerifyEmailController;
use App\Http\Controllers\Admin\BusinessSettingController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\TeamController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/get-sub-areas/{area_id}', [\App\Http\Controllers\Admin\UserController::class, 'getSubAreas'])->name('get-sub-areas');

    Route::get('/', [DashboardController::class, 'index'])
        ->middleware('auth:admin');

    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->middleware('auth:admin')
        ->name('dashboard');

    Route::get('/login', [AuthenticatedSessionController::class, 'create'])
        ->middleware('guest:admin')
        ->name('login');

    Route::post('/login', [AuthenticatedSessionController::class, 'store'])
        ->middleware('guest:admin');

    Route::get('/forgot-password', [PasswordResetLinkController::class, 'create'])
        ->middleware('guest:admin')
        ->name('password.request');

    Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])
        ->middleware('guest:admin')
        ->name('password.email');

    Route::get('/reset-password/{token}', [NewPasswordController::class, 'create'])
        ->middleware('guest:admin')
        ->name('password.reset');

    Route::post('/reset-password', [NewPasswordController::class, 'store'])
        ->middleware('guest:admin')
        ->name('password.update');

    Route::get('/verify-email', [EmailVerificationPromptController::class, '__invoke'])
        ->middleware('auth:admin')
        ->name('verification.notice');

    Route::get('/verify-email/{id}/{hash}', [VerifyEmailController::class, '__invoke'])
        ->middleware(['auth:admin', 'signed', 'throttle:6,1'])
        ->name('verification.verify');

    Route::post('/email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
        ->middleware(['auth:admin', 'throttle:6,1'])
        ->name('verification.send');

    Route::get('/confirm-password', [ConfirmablePasswordController::class, 'show'])
        ->middleware('auth:admin')
        ->name('password.confirm');

    Route::post('/confirm-password', [ConfirmablePasswordController::class, 'store'])
        ->middleware('auth:admin');

    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
        ->middleware('auth:admin')
        ->name('logout');

    Route::middleware('auth:admin')->group(function () {
        Route::resource('password-update', \App\Http\Controllers\Admin\PasswordUpdateController::class)
            ->only(['create', 'store']);
        Route::resource('profile-update', \App\Http\Controllers\Admin\ProfileUpdateController::class)
            ->only(['create', 'store']);

        Route::resource('user', \App\Http\Controllers\Admin\UserController::class);
        Route::resource('register-admin', \App\Http\Controllers\Admin\RegisterAdminController::class);

        Route::get('user-search', [\App\Http\Controllers\Admin\UserController::class, 'userSearch'])->name('user-search');

        Route::get('user/portal/{user}', [\App\Http\Controllers\Admin\UserController::class, 'portal'])->middleware('role:admin')->name('user.portal');

        /* Home Page Route  */
        Route::resource('slider', SliderController::class);
        Route::resource('team', TeamController::class);





        /* Business setting routes  */
        Route::get('basic-info', [BusinessSettingController::class, 'index'])->name('basic-info.index');
        Route::get('social-links', [BusinessSettingController::class, 'socialLinks'])->name('social-links.index');
        Route::post('business-setting', [BusinessSettingController::class, 'businessSettingUpdate'])->name('business-setting.update');
        Route::get('apps', [BusinessSettingController::class, 'apps'])->name('apps.index');
        Route::post('apps-upload', [BusinessSettingController::class, 'appsUpload'])->name('apps.store');
    });
});
