<?php

use App\Http\Controllers\Admin\AdminProfileController;
use App\Http\Controllers\frontend\HomeController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Frontend\UserController;
use App\Http\Controllers\Frontend\UserProfileController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
Route::middleware('auth')->group(function () {
    Route::group(['prefix' => 'profile', 'as' => 'profile.'], function () {
        Route::get('/', [ProfileController::class, 'edit'])->name('edit');
        Route::patch('/', [ProfileController::class, 'update'])->name('update');
        Route::delete('/', [ProfileController::class, 'destroy'])->name('destroy');
    });
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [HomeController::class, 'home'])->name('dashboard');

    //    User Profile Routes
    Route::get('profile', [UserProfileController::class, 'userProfile'])->name('user.profile');
    Route::get('profile/edit', [UserProfileController::class, 'editProfile'])->name('user.edit-profile');
    Route::post('/profile/update', [UserProfileController::class, 'updateProfile'])->name('user.profile-update');


});
require __DIR__ . '/auth.php';
require __DIR__ . '/admin.php';
