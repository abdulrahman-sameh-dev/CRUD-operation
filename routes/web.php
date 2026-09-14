<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
})->name('home');

Route::get('/dashboard', [EmployeeController::class, "index"])->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [EmployeeController::class, 'index'])->name('dashboard');
    Route::get('/create', [EmployeeController::class, 'create'])->name('create');
    Route::post('/dashboard', [EmployeeController::class, 'store'])->name('employees.store');
    Route::get('/dashboard/{employee}', [EmployeeController::class, 'show'])->name('employees.show');
    Route::delete('/dashboard/{employee}/delete', [EmployeeController::class, 'destroy'])->name('employees.destroy');
    Route::get('/dashboard/{employee}/edit', [EmployeeController::class, 'edit'])->name('employees.edit');
    Route::put('/dashboard/{employee}', [EmployeeController::class, 'update'])->name('employees.update');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
