<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\AssignController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\UniversityController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\DateController;
use App\Http\Controllers\ConsultantController;
use App\Http\Controllers\DateAssignController;
use App\Http\Controllers\ScheduleAssignController;
use App\Http\Controllers\ConsultingCountryController;
use App\Http\Controllers\CountryAssignController;

Route::get('/', function () {
    return view('Customer/welcome');
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

Route::get('/forgotpassword', function () {
    return view('forgotpassword');
})->name('forgotpassword');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::post('/login/post', [AuthController::class, 'checkUser'])->name('login.post');
Route::post('/login/register', [AuthController::class, 'Register'])->name('login.register');

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/scheduleassign', [ScheduleAssignController::class, 'index'])->name('scheduleassign');
Route::post('/scheduleassign/store', [ScheduleAssignController::class, 'store'])->name('scheduleassign.store');
Route::get('/scheduleassign/edit/{id}', [ScheduleAssignController::class, 'edit'])->name('scheduleassign.edit');
Route::put('/scheduleassign/update/{id}', [ScheduleAssignController::class, 'update'])->name('scheduleassign.update');
Route::delete('/scheduleassign/delete/{id}', [ScheduleAssignController::class, 'destroy'])->name('scheduleassign.destroy');

Route::get('/dateassign', [DateAssignController::class, 'index'])->name('dateassign');
Route::post('/dateassign/store', [DateAssignController::class, 'store'])->name('dateassign.store');
Route::get('/dateassign/edit/{id}', [DateAssignController::class, 'edit'])->name('dateassign.edit');
Route::post('/dateassign/update/{id}', [DateAssignController::class, 'update'])->name('dateassign.update');
Route::delete('/dateassign/delete/{id}', [DateAssignController::class, 'destroy'])->name('dateassign.destroy');

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

Route::get('/countryassign', [CountryAssignController::class, 'index'])->name('countryassign');
Route::post('/countryassign/store', [CountryAssignController::class, 'store'])->name('countryassign.store');
Route::get('/countryassign/edit/{id}', [CountryAssignController::class, 'edit'])->name('countryassign.edit');
Route::post('/countryassign/update/{id}', [CountryAssignController::class, 'update'])->name('countryassign.update');
Route::delete('/countryassign/delete/{id}', [CountryAssignController::class, 'destroy'])->name('countryassign.destroy');







// For Customer
Route::get('/chooseconsultant', [AppointmentController::class, 'showconsultant'])->name('chooseconsultant');
Route::get('/choosedatetime/{id}', [AppointmentController::class, 'showdatetime'])->name('choosedatetime');
Route::get('/bookappointment/{id1}/{id2}/{date}', [AppointmentController::class, 'showappointment'])->name('bookappointment');
Route::post('/bookappointment/store', [AppointmentController::class, 'storeappointment'])->name('bookappointment.store');
Route::get('/CReturn', [AuthController::class, 'Creturn'])->name('CReturn');
Route::get('/history/{userid}', [AppointmentController::class, 'showappointmentlist'])->name('history');