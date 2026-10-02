<?php

use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/login',[LoginController::class, 'showLogin'])->name('login');
Route::post('/login', [LoginController::class, 'login'])
    ->name('login.process');

Route::post('/logout', [LoginController::class, 'logout'])
    ->name('logout');


Route::middleware(['auth', 'role:employee'])->group(function () {

    Route::get('/employee/dashboard', function () {
        return view('employee.index');
    })->name('employee.index');

});






Route::middleware(['auth', 'role:admin'])->group( function(){
Route::get('departments/list', [DepartmentController::class, 'index'])->name('admin.department.index');
Route::get('/employees/list', [EmployeeController::class, 'index'])->name('admin.index');
Route::get('/employees/home', [EmployeeController::class, 'home'])->name('admin.home');
Route::get('/employees/create', [EmployeeController::class, 'create'])->name('admin.create');
Route::get('/employees/{id}', [EmployeeController::class, 'show'])->name('admin.show');
Route::post('/employees', [EmployeeController::class, 'store'])->name('admin.store');
Route::get('/employees/{id}/edit', [EmployeeController::class, 'edit'])->name('admin.edit');
Route::put('/employees/{id}', [EmployeeController::class, 'update'])->name('admin.update');
Route::delete('/employees/{id}', [EmployeeController::class, 'destroy'])->name('admin.destroy');

});