use App\Http\Controllers\LaporanController;


Route::middleware('auth:sanctum')->group(function () {
Route::get('/laporan', [LaporanController::class, 'index']);
Route::get('/laporan/{id}', [LaporanController::class, 'show']);


// Student
Route::post('/laporan', [LaporanController::class, 'store']);
Route::put('/laporan/{id}', [LaporanController::class, 'update']);
Route::delete('/laporan/{id}', [LaporanController::class, 'destroy']);


// Petugas/Admin
Route::patch('/laporan/{id}/status', [LaporanController::class, 'updateStatus']);
});