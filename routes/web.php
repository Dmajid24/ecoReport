<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReportController;


Route::get('/', function () {
    return view('welcome');
});
Route::middleware(['auth', 'role:student'])->group(function () {
    Route::resource('reports', ReportController::class);

});

