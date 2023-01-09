<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\TransportController;
use App\Http\Controllers\TravellerController;
use App\Http\Controllers\UserController;


Route::controller(AuthController::class)->group(function () {
	Route::post('/login', 'login');
	Route::post('/register', 'register');
	Route::post('/logout', 'logout')->middleware('auth:sanctum');
});

Route::middleware("auth:sanctum")->group(function () {

	Route::resource("cars", CarController::class)
		->except(["create", "edit"]);

	Route::resource("users", UserController::class)
		->except(["create", "edit"]);


	Route::resource("transports", TransportController::class)
		->except(["create", "edit"]);

	Route::get("travellers", [TravellerController::class, "index"]);
});
