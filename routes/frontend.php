<?php

use App\Http\Controllers\Frontend\AuthController;
use App\Http\Controllers\Frontend\GoogleAuthController;
use App\Http\Controllers\Frontend\PageController;
use App\Http\Controllers\Frontend\ProfileController;
use App\Http\Controllers\Frontend\ProductController;
use App\Http\Middleware\FrontendAuthenticate;
use Illuminate\Support\Facades\Route;

Route::prefix('frontend')->name('frontend.')->group(function () {
    Route::get('/auth/google', [GoogleAuthController::class, 'redirect'])->name('google.redirect');
    Route::get('/auth/google/callback', [GoogleAuthController::class, 'callback'])->name('google.callback');
    Route::get('/auth/google/link', [GoogleAuthController::class, 'showLink'])->name('google.link');
    Route::post('/auth/google/link', [GoogleAuthController::class, 'link'])->name('google.link.submit');
    Route::get('/signin.php', [AuthController::class, 'showLogin'])->name('signin');
    Route::post('/signin.php', [AuthController::class, 'login'])->name('signin.submit');
    Route::post('/logout.php', [AuthController::class, 'logout'])->name('logout');
    // Old GET links are confirmation only; logging out requires a CSRF-protected POST.
    Route::get('/logout.php', function () {
        return redirect()->route('frontend.signin');
    });

    Route::get('/forgot-password.php', [AuthController::class, 'showForgotPassword'])->name('password.request');
    Route::post('/forgot-password.php', [AuthController::class, 'sendResetLink'])->name('password.email');
    Route::get('/reset-password/{token}', [AuthController::class, 'showResetPassword'])->name('password.reset');
    Route::post('/reset-password.php', [AuthController::class, 'resetPassword'])->name('password.update');
    Route::get('/register.php', function () {
        return redirect()->route('frontend.signin')->with('frontend.status', 'กรุณาติดต่อผู้ดูแลเพื่อเปิดบัญชีคู่ค้า');
    })->name('registration-info');

    Route::middleware(FrontendAuthenticate::class)->group(function () {
        Route::get('/product.php', [ProductController::class, 'index'])->name('catalog.index');
        Route::get('/product-detail.php', [ProductController::class, 'show'])->name('catalog.show');
        Route::get('/search.php', [ProductController::class, 'index'])->name('catalog.search');
        Route::post('/edit-profile.php', [ProfileController::class, 'update'])->name('profile.update');
        Route::post('/change-password.php', [ProfileController::class, 'password'])->name('profile.password');
        Route::get('/', [PageController::class, 'home'])->name('home');
        Route::get('/{page}.php', [PageController::class, 'show'])
            ->whereIn('page', array_merge(PageController::PAGES, array_keys(PageController::ALIASES), ['orders']))
            ->name('page');
    });
});
