<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SurveyController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/dashboard', [SurveyController::class, 'dashboard'])
    ->middleware(['auth'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {

    Route::get('/upload', function () {
        return view('upload');
    });

    Route::post('/upload', [SurveyController::class, 'store']);

    Route::get('/admin', [SurveyController::class, 'admin']);
    Route::get('/admin/results/{id}', [SurveyController::class, 'results']);
    Route::get('/admin/download/{id}', [SurveyController::class, 'download']);

});

require __DIR__.'/auth.php';
