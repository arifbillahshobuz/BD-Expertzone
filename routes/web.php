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
Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/partner', [HomeController::class, 'partnerList'])->name('partner.list');
Route::middleware(['auth', 'verified'])->group(function () {
    //    User Profile Routes
    Route::get('profile', [UserProfileController::class, 'userProfile'])->name('user.profile');
    Route::get('profile/edit', [UserProfileController::class, 'editProfile'])->name('user.edit-profile');
    Route::post('/profile/update', [UserProfileController::class, 'updateProfile'])->name('user.profile-update');
    Route::post('/change-password', [UserProfileController::class, 'changePassword'])->name('user.change-password');

    Route::post('update-cover-photo', [UserProfileController::class, 'updateCoverPhoto'])->name('user.update-cover-photo');
    Route::post('update-profile-photo', [UserProfileController::class, 'updateProfilePhoto'])->name('user.update-profile-photo');

});
require __DIR__ . '/auth.php';
require __DIR__ . '/admin.php';
