<?php

use App\Http\Controllers\Admin\AdminProfileController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DesignationController;
use App\Http\Controllers\Admin\PartnerController;
use App\Http\Controllers\PostCategoryController;
use Illuminate\Support\Facades\Route;


// Admin routes
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Admin profile routes
    Route::group(['prefix' => 'profile', 'as' => 'profile.'], function () {
        Route::get('/', [AdminProfileController::class, 'editProfile'])->name('edit');
        Route::put('/update', [AdminProfileController::class, 'updateProfile'])->name('update');
        Route::put('/change-password', [AdminProfileController::class, 'changePassword'])->name('password.update');
    });
    // Designation routes
    Route::group(['prefix' => 'designation', 'as' => 'designation.'], function () {
        Route::get('/', [DesignationController::class, 'index'])->name('index');
        Route::post('/store', [DesignationController::class, 'store'])->name('store');
        Route::put('/update/{designation}', [DesignationController::class, 'update'])->name('update');
        Route::delete('/delete/{designation}', [DesignationController::class, 'destroy'])->name('destroy');
    });
    // partner routes incomplete
    Route::group(['prefix' => 'partner', 'as' => 'partner.'], function () {
        Route::get('/', [PartnerController::class, 'index'])->name('index');
        Route::post('/store', [PartnerController::class, 'store'])->name('store');

        Route::put('/update/{designation}', [PartnerController::class, 'update'])->name('update');
        Route::delete('/delete/{designation}', [PartnerController::class, 'destroy'])->name('destroy');

        Route::post('/update/{partner}', [PartnerController::class, 'update'])->name('update');
        Route::delete('/delete/{partner}', [PartnerController::class, 'destroy'])->name('destroy');
    });
    // post category routes
    Route::group(['prefix' => 'post-category', 'as' => 'post.category.'], function () {
        Route::get('/', [PostCategoryController::class, 'index'])->name('index');
        Route::post('/store', [PostCategoryController::class, 'store'])->name('store');
        Route::put('/update/{postcategory}', [PostCategoryController::class, 'update'])->name('update');
        Route::delete('/delete/{postcategory}', [PostCategoryController::class, 'destroy'])->name('destroy');
    });
});






