<?php

namespace App\Repository;

use App\Interfaces\ICarRepository;
use App\Models\Car;
use Illuminate\Support\Str;

class CarRepository implements ICarRepository
{
	public function getAllCars()
	{
		return Car::with('driver:id,name,email')->get();
	}

	public function getCarById(int $id)
	{
		return Car::with('driver:id,name,email')->where('id', $id)->firstOrFail();
	}

	public function createCar(array $car)
	{
		return Car::create($car)->load("driver:id,name,email");
	}

	public function updateCarById(int $id, $updatedCar)
	{

		Car::where('id', $id)->update($updatedCar);

		return $this->getCarById($id);
	}

	public function deleteCarById(int $id)
	{
		Car::where('id', $id)->delete();
	}
}
