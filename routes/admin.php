<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DesignationController;
use Illuminate\Support\Facades\Route;


// Admin routes
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/designation', [DesignationController::class, 'index'])->name('designation.index');
    Route::get('/designation/create', [DesignationController::class, 'create'])->name('designation.create');
    Route::get('/designation/edit/{designation}', [DesignationController::class, 'edit'])->name('designation.edit');
    Route::post('/designation/store', [DesignationController::class, 'store'])->name('designation.store');
    Route::put('/designation/update/{designation}', [DesignationController::class, 'update'])->name('designation.update');
    Route::delete('/designation/delete/{designation}', [DesignationController::class, 'destroy'])->name('designation.destroy');
});






