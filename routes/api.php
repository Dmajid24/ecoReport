<?php
use App\Http\Controllers\ReportController;


Route::middleware('auth:sanctum')->group(function () {
Route::get('/laporan', [ReportController::class, 'index']);
Route::get('/laporan/{id}', [ReportController::class, 'show']);


// Student
Route::post('/laporan', [ReportController::class, 'store']);
Route::put('/laporan/{id}', [ReportController::class, 'update']);
Route::delete('/laporan/{id}', [ReportController::class, 'destroy']);


// Petugas/Admin
Route::patch('/laporan/{id}/status', [ReportController::class, 'updateStatus']);
});