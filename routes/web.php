<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Pages\CategoryController;
use App\Http\Controllers\Pages\DepartementController;
use App\Http\Controllers\Pages\DashboardController;
use App\Http\Controllers\Pages\UserController;
use App\Http\Controllers\Pages\WorkOrderController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [AuthenticatedSessionController::class, 'create'])
    ->middleware('guest')
    ->name('login');
Route::post('/', [AuthenticatedSessionController::class, 'store']);

Route::middleware('auth')->group(function () {
    // Dashboard
    Route::get("/dashboard", [DashboardController::class, 'index'])->name("dashboard");

    // Departement
    Route::get("/departements", [DepartementController::class, 'index'])->name("departement.index");
    Route::get('/departements/checkSlug', [DepartementController::class, 'checkSlug']);

    // Category
    Route::get("/categories", [CategoryController::class, 'index'])->name("category.index");
    Route::get('/categories/checkSlug', [CategoryController::class, 'checkSlug']);

    // Work-order
    Route::get("/work-orders", [WorkOrderController::class, 'index'])->name("work-order.index");

    // Users
    Route::get("/users", [UserController::class, 'index'])->name("user.index");
    Route::post("/users", [UserController::class, 'store'])->name("user.store");
    Route::put("/users/{users:id}", [UserController::class, 'update'])->name("user.update");
    Route::put('/user/{user:id}/akses', [UserController::class, 'akses'])->name('user.update.role');
    Route::put('/user/{user:id}/update-password', [UserController::class, 'updatePassword'])->name('user.update.password');
});

require __DIR__ . '/auth.php';
require __DIR__ . '/default-menu.php';
