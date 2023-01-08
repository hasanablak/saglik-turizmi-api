<?php

namespace App\Http\Controllers;

use App\Http\Requests\CarStoreRequest;
use App\Http\Requests\CarUpdateRequest;
use Illuminate\Http\Request;
use App\Interfaces\ICarRepository;

class CarController extends Controller
{
	protected $car;

	public function __construct(ICarRepository $car)
	{
		$this->car = $car;
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		return response($this->car->getAllCars());
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(CarStoreRequest $request)
	{
		$car = $request->only(['plate', 'driver_id', 'seats_count']);
		return response($this->car->createCar($car));
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		return $this->car->getCarById($id);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(CarUpdateRequest $request, $id)
	{
		$car = $request->only("plate", "seats_count", "driver_id");
		return $this->car->updateCarById($id, $car);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		$this->car->deleteCarById($id);
	}
}
