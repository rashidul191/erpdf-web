<?php

use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Admin\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Admin\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Admin\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Admin\Auth\NewPasswordController;
use App\Http\Controllers\Admin\Auth\PasswordResetLinkController;
use App\Http\Controllers\Admin\Auth\VerifyEmailController;
use App\Http\Controllers\Admin\BlogCategoryController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\BusinessSettingController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ClientBrandController;
use App\Http\Controllers\Admin\ClientSayController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DocumentCategoryController;
use App\Http\Controllers\Admin\DocumentController;
use App\Http\Controllers\Admin\DynamicSEOController;
use App\Http\Controllers\Admin\FAQController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\MenuManageController;
use App\Http\Controllers\Admin\OurStoryController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\SpecializationController;
use App\Http\Controllers\Admin\SubMenuController;
use App\Http\Controllers\Admin\SubOfSubMenuController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\TeamCategoryController;
use App\Http\Controllers\Admin\TeamController;
use App\Http\Controllers\ContactFormMessageController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->name('admin.')->group(function () {

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

        /* Menu Routes Start */
        Route::resource('menu-manage', MenuManageController::class);
        Route::post('dynamic-menu', [MenuManageController::class, 'dynamicMenuStore'])->name('dynamic-menu.store');
        Route::delete('dynamic-menu/{menu_manage_id}/{id}', [MenuManageController::class, 'dynamicMenuDestroy'])->name('dynamic-menu.destroy');
        Route::resource('navmenu', MenuController::class);
        Route::resource('menu', MenuController::class);
        Route::resource('sub-menu', SubMenuController::class);
        Route::resource('sub-of-sub-menu', SubOfSubMenuController::class);

        /* Menu Routes End */

        Route::resource('page', PageController::class);

        Route::resource('tag', TagController::class);
        Route::resource('categories', CategoryController::class);
        Route::resource('brands', BrandController::class);

        /* Home Page Routes  */
        Route::resource('slider', SliderController::class);
        Route::get('google-map', [SliderController::class, 'homeGoogleMap'])->name('home-google-map.index');
        Route::get('about-section', [AboutController::class, 'homeAboutSection'])->name('home-about-section.index');


        Route::resource('client-say', ClientSayController::class);
        Route::resource('client-brand', ClientBrandController::class);

        /* About Page Routes */
        Route::get('about', [AboutController::class, 'index'])->name('about.index');

        Route::post('about-left-side', [AboutController::class, 'aboutLeftSideStore'])->name('about.left-side.store');
        Route::get('about-left-side/{id}', [AboutController::class, 'aboutLeftSideEdit'])->name('about.left-side.edit');
        Route::post('about-left-side/{id}', [AboutController::class, 'aboutLeftSideUpdate'])->name('about.left-side.update');
        Route::delete('about-left-side/{id}', [AboutController::class, 'aboutLeftSideDelete'])->name('about.left-side.destroy');
        Route::post('about-right-side', [AboutController::class, 'aboutRightSide'])->name('about.right-side');
        Route::delete('about-right-side/{id}', [AboutController::class, 'aboutRightSideDelete'])->name('about.right-side.destroy');

        Route::get('specialization', [SpecializationController::class, 'index'])->name('specialization.index');
        Route::resource('services', ServiceController::class);
        Route::resource('our-story', OurStoryController::class);
        Route::resource('team-categories', TeamCategoryController::class);
        Route::resource('team', TeamController::class);

        Route::resource('document-categories', DocumentCategoryController::class);
        Route::resource('document', DocumentController::class);

        Route::resource('faq', FAQController::class);
        Route::resource('contact-message', ContactFormMessageController::class);

        /* Gallery Page Routes */
        Route::resource('gallery', GalleryController::class);

        /* Blog Routes */
        Route::resource('blog', BlogController::class);
        Route::resource('blog-categories', BlogCategoryController::class);


        Route::resource('dynamic-seo', DynamicSEOController::class);

        /* Business setting routes  */
        Route::get('basic-info', [BusinessSettingController::class, 'index'])->name('basic-info.index');
        Route::get('social-links', [BusinessSettingController::class, 'socialLinks'])->name('social-links.index');
        Route::post('business-setting', [BusinessSettingController::class, 'businessSettingUpdate'])->name('business-setting.update');
        Route::get('apps', [BusinessSettingController::class, 'apps'])->name('apps.index');
        Route::post('apps-upload', [BusinessSettingController::class, 'appsUpload'])->name('apps.store');
    });
});
