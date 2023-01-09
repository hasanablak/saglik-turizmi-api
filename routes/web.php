<?php

use App\Models\Transport;
use App\Models\User;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
	$x = Transport::with('startProvince')
		->with('startCounty')
		->with('startDistrict')
		->first();

	$y = User::with('transports')->get();

	/**
	 * User'lardan sadece transportu olanların gelmesini istiyorum
	 */
	$a = User::whereHas('transports')->with('transports')->get();



	return response($a);
});


Route::get("second", function () {

	$users = User::whereHas('transports')
		->with('transports')
		->get();
	return $users;
	foreach ($users as $user) {
		foreach ($user->transports as $transport) {
			dd($transport->pivot->types->name);
		}
	}

	return $users;
});

Route::get("third", function () {
	$users = User::whereHas('areaTests')
		->with('areaTests')
		->get();
	return $users;
});
