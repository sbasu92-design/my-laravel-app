<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Route;

Route::get('admin/login', [AuthController::class, 'login'])->name('admin.login');
Route::post('admin/login', [AuthController::class, 'admin_auth_login'])->name('admin.auth.login');

// Admin Dashboard (Protected by Middleware)
Route::middleware(['auth:admin'])->group(function () {

    Route::get('admin/dashboard', [DashboardController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('admin/list', [AdminController::class, 'showadmin'])->name('admin.list');
    Route::get('admin/addadmin', [AdminController::class, 'addnewadmin'])->name('admin.addadmin');
    Route::post('/admin/storeadmin', [AdminController::class, 'storeadmin'])->name('admin.storeadmin');
    Route::get('admin/editadmin/{id}', [AdminController::class, 'editadmin'])->name('admin.editadmin');
    Route::post('/admin/updateadmin/{id}', [AdminController::class, 'updateadmin'])->name('admin.updateadmin');
    Route::get('/admin/deleteadmin/{id}', [AdminController::class, 'deleteadmin'])->name('admin.deleteadmin');
    // Route::get('admin/list', function () {
    //     $data['header_title'] = "Admin";
    //     return view('admin.list', $data); // Ensure this view exists
    // })->name('admin.list');
    Route::get('admin/categorylist', [AdminController::class, 'categorylistall'])->name('admin.categorylist');

    Route::get('admin/logout', [AuthController::class, 'admin_logout'])->name('admin.logout');
});
