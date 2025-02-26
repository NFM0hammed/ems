<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\AbsencesController;
use App\Http\Controllers\AttendancesController;
use App\Http\Controllers\DeparturesController;

Route::get('/', [UsersController::class, 'login'])->name(name: 'user.login');

Route::get('/home', [UsersController::class, 'index'])->name(name: 'user.index');

Route::post('/home', [UsersController::class, 'signin'])->name(name: 'user.signin');

Route::post('/', [UsersController::class, 'logout'])->name(name: 'user.logout');

Route::get('/absences', [AbsencesController::class, 'absences'])->name(name: 'user.absences');

Route::get('/attendances', [AttendancesController::class, 'attendances'])->name(name: 'user.attendances');

Route::get('/departures', [DeparturesController::class, 'departures'])->name(name: 'user.departures');

Route::get('/edit', [UsersController::class, 'edit'])->name(name: 'user.edit');

Route::put('/home', [UsersController::class, 'update'])->name(name: 'user.update');

Route::get('/check-in', [AttendancesController::class, 'checkin'])->name(name: 'user.checkin');

Route::post('/check-in', [AttendancesController::class, 'checkin_test'])->name(name: 'user.checkin_test');

Route::get('/check-out', [DeparturesController::class, 'checkout'])->name(name: 'user.checkout');

Route::post('/check-out', [DeparturesController::class, 'checkout_test'])->name(name: 'user.checkout_test');
