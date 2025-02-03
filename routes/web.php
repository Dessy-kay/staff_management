<?php

use App\Http\Controllers\staff_controller;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::resource("/", staff_controller::class);
Route::get('/', [staff_controller::class, 'index'])->name('index');
Route::get('/create', [staff_controller::class, 'create'])->name('create');
Route::post('/', [staff_controller::class, 'store'])->name('store');
Route::get('/{id}/edit', [staff_controller::class, 'edit'])->name('edit');
Route::put('/{id}', [staff_controller::class, 'update'])->name('update');
Route::delete('/{id}', [staff_controller::class, 'destroy'])->name('destroy');
