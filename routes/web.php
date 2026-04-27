<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\studentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/students', [studentController::class, 'getStudents']);
    Route::post('/add-students', [studentController::class, 'addStudents']);
    Route::get('/students/edit/{id}', [studentController::class, 'edit']);
    Route::post('/students/update/{id}', [studentController::class, 'updateStudents']);
    Route::get('/students/delete/{id}', [studentController::class, 'deleteStudents']);
});

Route::get('/upload', [studentController::class, 'showFiles']);

Route::post('/upload', [studentController::class, 'uploadFile']);

Route::post('upload/delete', [studentController::class, 'deleteFile']);


require __DIR__ . '/auth.php';
