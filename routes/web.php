<?php

use App\Http\Controllers\AssignController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\UniversityController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\DateController;
use App\Http\Controllers\ConsultantController;

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
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::post('/login/post', [AuthController::class, 'checkUser'])->name('login.post');
Route::post('/login/register', [AuthController::class, 'Register'])->name('login.register');

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/scheduleassign', [AssignController::class, 'index'])->name('scheduleassign');
Route::post('/scheduleassign/store', [AssignController::class, 'store'])->name('scheduleassign.store');
Route::get('/scheduleassign/edit/{id}', [AssignController::class, 'edit'])->name('scheduleassign.edit');
Route::post('/scheduleassign/update/{id}', [AssignController::class, 'update'])->name('scheduleassign.update');
Route::delete('/scheduleassign/delete/{id}', [AssignController::class, 'destroy'])->name('scheduleassign.destroy');

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

Route::get('/schedulemanagement', [ScheduleController::class, 'index'])->name('schedulemanagement');
Route::post('/schedule/store', [ScheduleController::class, 'store'])->name('schedule.store');
Route::get('/schedule/edit/{id}', [ScheduleController::class, 'edit'])->name('schedule.edit');
Route::post('/schedule/update/{id}', [ScheduleController::class, 'update'])->name('schedule.update');
Route::delete('/schedule/delete/{id}', [ScheduleController::class, 'destroy'])->name('schedule.destroy');

Route::get('/datemanagement', [DateController::class, 'index'])->name('datemanagement');
Route::post('/date/store', [DateController::class, 'store'])->name('date.store');
Route::get('/date/edit/{id}', [DateController::class, 'edit'])->name('date.edit');
Route::post('/date/update/{id}', [DateController::class, 'update'])->name('date.update');
Route::delete('/date/delete/{id}', [DateController::class, 'destroy'])->name('date.destroy');

Route::get('/consultantmanagement', [ConsultantController::class, 'index'])->name('consultantmanagement');
Route::post('/consultant/store', [ConsultantController::class, 'store'])->name('consultant.store');
Route::get('/consultant/edit/{id}', [ConsultantController::class, 'edit'])->name('consultant.edit');
Route::post('/consultant/update/{id}', [ConsultantController::class, 'update'])->name('consultant.update');
Route::delete('/consultant/delete/{id}', [ConsultantController::class, 'destroy'])->name('consultant.destroy');
