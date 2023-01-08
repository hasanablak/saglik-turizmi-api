<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CarController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
	return $request->user();
});


Route::post('/tokens/create', function (Request $request) {
	$token = $request->user()->createToken($request->token_name);

	return ['token' => $token->plainTextToken];
});

Route::post('/sanctum/token', function (Request $request) {
	$request->validate([
		'email' => 'required|email',
		'password' => 'required',
		'device_name' => 'required',
	]);

	$user = User::where('email', $request->email)->first();

	if (!$user || !Hash::check($request->password, $user->password)) {
		throw ValidationException::withMessages([
			'email' => ['The provided credentials are incorrect.'],
		]);
	}

	return $user->createToken($request->device_name)->plainTextToken;
});


Route::controller(AuthController::class)->group(function () {
	Route::post('/login', 'login');
	Route::post('/register', 'register');
	Route::post('/logout', 'logout')->middleware('auth:api');
});

Route::resource("cars", CarController::class)
	->middleware('auth:sanctum')
	->except(["create"]);
