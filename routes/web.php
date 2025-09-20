<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HospitalController;
use App\Http\Controllers\PatientController;

Route::get('/', function () {
    return view('index');
});
Route::post('/login', [UserController::class, 'login'])->name('login');

Route::get('/hospitalList', [HospitalController::class, 'index'])->name('hospital.list');
Route::get('/hospitalFormCreate', [HospitalController::class, 'form_create'])->name('hospital.form.create');
Route::post('/hospitalCreate', [HospitalController::class, 'create'])->name('hospital.create');
Route::get('/hospital/{id}/edit', [HospitalController::class, 'form_update'])->name('hospital.form.update');
Route::put('/hospital/{id}', [HospitalController::class, 'update'])->name('hospital.update');
Route::delete('/hospital/{id}', [HospitalController::class, 'delete'])->name('hospital.delete');

Route::get('/patientList', [PatientController::class, 'index'])->name('patient.list');
Route::get('/patientFormCreate', [PatientController::class, 'form_create'])->name('patient.form.create');
Route::post('/patientCreate', [PatientController::class, 'create'])->name('patient.create');
Route::get('/patient/{id}/edit', [PatientController::class, 'form_update'])->name('patient.form.update');
Route::put('/patient/{id}', [PatientController::class, 'update'])->name('patient.update');
Route::delete('/patient/{id}', [PatientController::class, 'delete'])->name('patient.delete');
Route::post('/patient/filter', [PatientController::class, 'filter'])->name('patient.filter');
