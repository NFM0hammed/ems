<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\AbsencesController;
use App\Http\Controllers\AttendancesController;
use App\Http\Controllers\DeparturesController;

Route::get('/', [UsersController::class, 'login'])->name(name: 'users.login');

Route::post('/', [UsersController::class, 'logout'])->name(name: 'users.logout');

Route::get('/users/create', [UsersController::class, 'create'])->name(name: 'users.create');

Route::match(['get', 'post'], '/users/{action}', [UsersController::class, 'handle'])->name(name: 'users.handle');

Route::get('/users', [UsersController::class, 'index'])->name(name: "users.index");
Route::delete('/users/{id}', [UsersController::class, 'destroy'])->name(name: 'users.destroy');

Route::get("/checkin", [AbsencesController::class, "show"])->name(name: "checkin.show");
Route::post("/users/{id}/absences", [AbsencesController::class, "add_absence"])->name(name: "user.absence");
Route::get('/users/{id}/absences', [AbsencesController::class, 'absences'])->name(name: 'users.absences');
Route::delete('/users/{id}/absences', [AbsencesController::class, 'destroy'])->name(name: 'absences.destroy');


Route::get('/users/{id}/attendances', [AttendancesController::class, 'attendances'])->name(name: 'users.attendances');
Route::delete('/users/{id}/attendances', [AttendancesController::class, 'destroy'])->name(name: 'attendances.destroy');


Route::get("/checkout", [DeparturesController::class, "show"])->name(name: "checkout.show");
Route::post("/users/{id}/departures", [DeparturesController::class, "add_checkout"])->name(name: "user.checkout");
Route::get('/users/{id}/departures', [DeparturesController::class, 'departures'])->name(name: 'users.departures');
Route::delete('/users/{id}/departures', [DeparturesController::class, 'destroy'])->name(name: 'departures.destroy');


Route::get('/users/{id}/edit', [UsersController::class, 'edit'])->name(name: 'users.edit');
Route::put('/users{id}', [UsersController::class, 'update'])->name(name: 'users.update');
