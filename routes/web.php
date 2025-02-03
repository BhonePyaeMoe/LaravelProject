<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\UniversityController;

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
Route::post('/usermanagement/store', [UserController::class, 'store'])->name('user.store');
Route::get('/usermanagement/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
Route::post('/usermanagement/update/{id}', [UserController::class, 'update'])->name('user.update');
Route::delete('/usermanagement/delete/{id}', [UserController::class, 'destroy'])->name('user.destroy');

Route::get('/countrymanagement', [CountryController::class, 'index'])->name('countrymanagement');
Route::post('/country/store', [CountryController::class, 'store'])->name('country.store');
Route::get('/country/edit/{id}', [CountryController::class, 'edit'])->name('country.edit');
Route::post('/country/update/{id}', [CountryController::class, 'update'])->name('country.update');
Route::delete('/country/delete/{id}', [CountryController::class, 'destroy'])->name('country.destroy');

Route::get('/universitymanagement', [UniversityController::class, 'index'])->name('universitymanagement');
Route::post('/university/store', [UniversityController::class, 'store'])->name('university.store');
Route::get('/university/edit/{id}', [UniversityController::class, 'edit'])->name('university.edit');
Route::post('/university/update/{id}', [UniversityController::class, 'update'])->name('university.update');
Route::delete('/university/delete/{id}', [UniversityController::class, 'destroy'])->name('university.destroy');

Route::get('/schedulemanagement', function () {
    return view('Admin.Schedulemanagement');
})->name('schedulemanagement');
