<?php

use App\Http\Controllers\Api\CategoryApiController;
use App\Http\Controllers\Api\DepartementApiController;
use App\Http\Controllers\Api\WorkOrderApiController;
use App\Models\WorkOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/categories', [CategoryApiController::class, 'getCategory']);
Route::post('/categories', [CategoryApiController::class, 'store']);
Route::get('/categories/{category}', [CategoryApiController::class, 'show']);
Route::put('/categories/{category}', [CategoryApiController::class, 'update']);

Route::get('/departements', [DepartementApiController::class, 'getDepartement']);
Route::post('/departements', [DepartementApiController::class, 'store']);
Route::get('/departements/{departement}', [DepartementApiController::class, 'show']);
Route::put('/departements/{departement}', [DepartementApiController::class, 'update']);

Route::get('/generate-laporan-code', [WorkOrderApiController::class, 'generateLaporanCode']);
Route::get('/work-orders', [WorkOrderApiController::class, 'getWorkOrder']);
Route::post('/work-orders', [WorkOrderApiController::class, 'store']);
Route::get('/work-orders/{workOrder}', [WorkOrderApiController::class, 'show']);
Route::put('/work-orders/{workOrder}', [WorkOrderApiController::class, 'update']);
