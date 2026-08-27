<?php

use App\Http\Controllers\Admin\AdminProfileController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DesignationController;
use App\Http\Controllers\Admin\PartnerController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Frontend\PostCategoryController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\AuthenticationController;
use Illuminate\Support\Facades\Route;

Route::controller(AuthenticationController::class)->group(function () {
    Route::post('/verify-otp', 'userVerifyOTP')->name('password.verify');
    Route::get('/resend-otp', 'resendOtp')->name('resend.otp');
    Route::post('/reset-password', 'userResetPassword');
});
// Admin routes
Route::middleware(['auth', 'admin.access'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('permission:dashboard-view');

    // Settings
    Route::get('/settings', [SettingController::class, 'index'])->name('settings.index')->middleware('permission:setting-manage');
    Route::post('/settings/update', [SettingController::class, 'update'])->name('settings.update')->middleware('permission:setting-manage');

    // Role management
    Route::resource('roles', RoleController::class)->middleware('permission:role-list|role-create|role-edit|role-delete');
    Route::get('/roles-assign', [\App\Http\Controllers\Admin\UserRoleController::class, 'index'])->name('roles.assign.index')->middleware('permission:role-edit');
    Route::post('/roles-assign', [\App\Http\Controllers\Admin\UserRoleController::class, 'store'])->name('roles.assign.store')->middleware('permission:role-edit');
    Route::get('/users-search', [\App\Http\Controllers\Admin\UserRoleController::class, 'search'])->name('users.search')->middleware('permission:role-edit');
    
    // Permission management
    Route::resource('permissions', PermissionController::class)->middleware('permission:permission-list|permission-create|permission-edit|permission-delete');

    // Admin profile routes
    Route::group(['prefix' => 'profile', 'as' => 'profile.'], function () {
        Route::get('/', [AdminProfileController::class, 'editProfile'])->name('edit');
        Route::put('/update', [AdminProfileController::class, 'updateProfile'])->name('update');
        Route::put('/change-password', [AdminProfileController::class, 'changePassword'])->name('password.update');
    });
    // Designation routes
    Route::group(['prefix' => 'designation', 'as' => 'designation.'], function () {
        Route::get('/', [DesignationController::class, 'index'])->name('index')->middleware('permission:designation-list');
        Route::post('/store', [DesignationController::class, 'store'])->name('store')->middleware('permission:designation-create');
        Route::put('/update/{designation}', [DesignationController::class, 'update'])->name('update')->middleware('permission:designation-edit');
        Route::delete('/delete/{designation}', [DesignationController::class, 'destroy'])->name('destroy')->middleware('permission:designation-delete');
    });
    // partner routes
    Route::group(['prefix' => 'partner', 'as' => 'partner.'], function () {
        Route::get('/', [PartnerController::class, 'index'])->name('index')->middleware('permission:partner-list');
        Route::post('/store', [PartnerController::class, 'store'])->name('store')->middleware('permission:partner-create');
        Route::put('/update/{partner}', [PartnerController::class, 'update'])->name('update')->middleware('permission:partner-edit');
        Route::delete('/delete/{partner}', [PartnerController::class, 'destroy'])->name('destroy')->middleware('permission:partner-delete');
    });
    // Post management
    Route::resource('posts', PostController::class)->middleware('permission:post-list|post-create|post-edit|post-delete');
    // post category routes
    Route::group(['prefix' => 'post-category', 'as' => 'post.category.'], function () {
        Route::get('/', [PostCategoryController::class, 'index'])->name('index')->middleware('permission:post-category-list');
        Route::post('/store', [PostCategoryController::class, 'store'])->name('store')->middleware('permission:post-category-create');
        Route::put('/update/{postcategory}', [PostCategoryController::class, 'update'])->name('update')->middleware('permission:post-category-edit');
        Route::delete('/delete/{postcategory}', [PostCategoryController::class, 'destroy'])->name('destroy')->middleware('permission:post-category-delete');
    });

    // User management
    Route::resource('users', UserController::class)->middleware('permission:user-list|user-create|user-edit|user-delete');
});





