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
	$a = User::whereHas('transports')->with(['transports', 'transports.type'])->first();

	return response($a);
});
