<?php

use App\Http\Controllers\Frontend\PageController;
use Illuminate\Support\Facades\Route;

Route::prefix('frontend')->name('frontend.')->group(function () {
    Route::get('/', [PageController::class, 'home'])->name('home');
    Route::get('/signin.php', [PageController::class, 'show'])
        ->defaults('page', 'signin')->name('signin');
    Route::post('/signin.php', [PageController::class, 'previewSignIn'])->name('signin.submit');

    Route::get('/{page}.php', [PageController::class, 'show'])
        ->whereIn('page', array_merge(PageController::PAGES, array_keys(PageController::PENDING), ['orders', 'logout']))
        ->name('page');
});
