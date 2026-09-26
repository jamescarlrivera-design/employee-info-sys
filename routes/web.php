<?php

use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;

Route::get('/', function () {
    return view('welcome');
});


Route::middleware('auth')->group(function () {

    Route::get('/employees/home', [EmployeeController::class, 'home'])
        ->name('employee.home');

    Route::get('/employees', [EmployeeController::class, 'index'])
        ->name('employee.index');

});
Route::get('/login',[LoginController::class, 'showLogin'])->name('login');
Route::post('/login', [LoginController::class, 'login'])
    ->name('login.process');

Route::post('/logout', [LoginController::class, 'logout'])
    ->name('logout');


Route::middleware('auth')->group( function(){

Route::get('/employees/list', [EmployeeController::class, 'index'])->name('employee.index');
Route::get('/employees/home', [EmployeeController::class, 'home'])->name('employee.home');
Route::get('/employees/create', [EmployeeController::class, 'create'])->name('employee.create');
Route::get('/employees/{id}', [EmployeeController::class, 'show'])->name('employee.show');
Route::post('/employees', [EmployeeController::class, 'store'])->name('employee.store');
Route::get('/employees/{id}/edit', [EmployeeController::class, 'edit'])->name('employee.edit');
Route::put('/employees/{id}', [EmployeeController::class, 'update'])->name('employee.update');
Route::delete('/employees/{id}', [EmployeeController::class, 'destroy'])->name('employee.destroy');

});