<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;

Route::get('/', function () {
    return view('welcome');
});




Route::get('/employees', [EmployeeController::class, 'index'])->name('employee.index');
Route::get('/employees/create', [EmployeeController::class, 'create'])->name('employee.create');
Route::get('/employees/{id}', [EmployeeController::class, 'show'])->name('employee.show');
Route::post('/employees', [EmployeeController::class, 'store'])->name('employee.store');