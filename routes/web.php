<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
})->name('home');

Route::get('/dashboard', [EmployeeController::class, "index"])->middleware(['auth', 'verified'])->name('dashboard');


Route::get('/create', [EmployeeController::class, 'create'])->middleware(['auth'])->name('create');
Route::view('/create' , 'create')->name('create');
Route::post('/dashboard', [EmployeeController::class, 'store'])->name('dashboard.store');
Route::delete('/dashboard/{id}/delete', [EmployeeController::class, 'destroy'])->name('dashboard.store');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
