<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\studentController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/students', [studentController::class, 'getStudents']);
Route::post('/add-students', [studentController::class, 'addStudents']);
Route::get('/students/edit/{id}', [studentController::class, 'edit']);
Route::post('/students/update/{id}', [studentController::class, 'updateStudents']);
Route::get('/students/delete/{id}', [studentController::class, 'deleteStudents']);
