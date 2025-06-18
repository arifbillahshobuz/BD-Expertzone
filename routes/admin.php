<?php

use App\Http\Controllers\Admin\AdminProfileController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DesignationController;
use App\Http\Controllers\Admin\PartnerController;
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
        Route::get('/create', [DesignationController::class, 'create'])->name('create');
        Route::get('/edit/{designation}', [DesignationController::class, 'edit'])->name('edit');
        Route::post('/store', [DesignationController::class, 'store'])->name('store');
        Route::put('/update/{designation}', [DesignationController::class, 'update'])->name('update');
        Route::delete('/delete/{designation}', [DesignationController::class, 'destroy'])->name('destroy');
    });
    // Designation routes
    Route::group(['prefix' => 'partner', 'as' => 'partner.'], function () {
        Route::get('/', [PartnerController::class, 'index'])->name('index');
        Route::get('/list', [PartnerController::class, 'list'])->name('list');
        Route::get('create', [PartnerController::class, 'create'])->name('create');
        Route::get('edit/{id}', [PartnerController::class, 'edit'])->name('edit');
        Route::post('store', [PartnerController::class, 'store'])->name('store');
        Route::post('update/{id}', [PartnerController::class, 'update'])->name('update');
        Route::delete('delete/{id}', [PartnerController::class, 'destroy'])->name('destroy');
    });
});






