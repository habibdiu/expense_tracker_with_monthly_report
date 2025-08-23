<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\backend\ExpenseController;
use App\Http\Controllers\backend\ProfileController;
use App\Http\Controllers\backend\CategoryController;
use App\Http\Controllers\backend\DashboardController;
use App\Http\Middleware\backendAuthenticationMiddleware;
use App\Http\Controllers\backend\AuthenticationController;

Route::redirect('/', 'login');
// backend
Route::match(['get', 'post'], 'login', [AuthenticationController::class, 'login'])->name('login');
// route prefix
Route::prefix('admin')->group(function () {
    // route name prefix
    Route::name('admin.')->group(function () {
        //middleware
        Route::middleware(backendAuthenticationMiddleware::class)->group(function () {
            Route::get('logout', [AuthenticationController::class, 'logout'])->name('logout');
            //profile
            Route::get('profile', [ProfileController::class, 'profile'])->name('profile');
            Route::post('profile-info/update', [ProfileController::class, 'profile_info_update'])->name('profile.info.update');
            Route::post('profile-password/update', [ProfileController::class, 'profile_password_update'])->name('profile.password.update');

            
            //dashboard
            Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
            
            // Expense Tracking
            Route::get('category', [CategoryController::class, 'category'])->name('category');
            Route::post('category/store', [CategoryController::class, 'category_store_and_list'])->name('category.store');

            Route::match(['get', 'post'], 'expense', [ExpenseController::class, 'expense'])->name('expense');
            Route::get('expense/list', [ExpenseController::class, 'expense_list'])->name('expense_list');
            Route::get('monthly-report', [ExpenseController::class, 'monthlyReport'])->name('monthly.report');


           
        });
    });
});
