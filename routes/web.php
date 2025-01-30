<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/services', function () {
    return view('services');
})->name('services');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/login', function () {
    return view('auth');
})->name('login');

Route::get('/register', function () {
    return view('register');
})->name('register');

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/usermanagement', [UserController::class, 'index'])->name('usermanagement');
Route::get('/usermanagement/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
Route::post('/usermanagement/update/{id}', [UserController::class, 'update'])->name('user.update');
Route::delete('/usermanagement/delete/{id}', [UserController::class, 'destroy'])->name('user.destroy');

Route::get('/schedulemanagement', function () {
    return view('Admin.Schedulemanagement');
})->name('schedulemanagement');

