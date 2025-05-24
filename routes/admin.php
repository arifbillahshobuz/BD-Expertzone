<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DesignationController;
use Illuminate\Support\Facades\Route;


//add prefix list this admin/dashboard and route name admin.dashboard
//add prefix list this admin/profile and route name admin.profile


Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');


    //Designation Routes
    Route::get('/designation', [DesignationController::class, 'index'])->name('designation.index');
    Route::get('/designation/create', [DesignationController::class, 'create'])->name('designation.create');
    Route::get('/designation/edit/{designation}', [DesignationController::class, 'edit'])->name('designation.edit');
    Route::post('/designation/store', [DesignationController::class, 'store'])->name('designation.store');
    Route::put('/designation/update/{designation}', [DesignationController::class, 'update'])->name('designation.update');
    Route::delete('/designation/delete/{designation}', [DesignationController::class, 'destroy'])->name('designation.destroy');
});



