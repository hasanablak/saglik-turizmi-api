<?php

namespace App\Interfaces;

interface ICarRepository
{
	public function getAllCars();

	public function getCarById(int $id);

	public function createCar(array $car);

	public function updateCarById(int $id, array $car);

	public function deleteCarById(int $id);
}
