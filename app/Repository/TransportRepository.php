<?php

namespace App\Repository;

use App\Interfaces\ITransportRepository;
use App\Models\Transport;

class TransportRepository implements ITransportRepository
{
	public function getAllTransports()
	{
		return Transport::query()
			->with("travellers")
			->with('startProvince')
			->with('startCounty')
			->with('startDistrict')
			->with('finishProvince')
			->with('finishCounty')
			->with('finishDistrict')
			->get();
	}

	public function getTransportById(int $id)
	{
		return Transport::where('id', $id)
			->with("travellers")
			->with('startProvince')
			->with('startCounty')
			->with('startDistrict')
			->with('finishProvince')
			->with('finishCounty')
			->with('finishDistrict')
			->firstOrFail();
	}

	public function createTransport(array $newTransport)
	{
		$transport = Transport::create($newTransport);

		$transport->travellers()->attach($newTransport["travellers"]);

		return $this->getTransportById($transport->id);
	}

	public function updateTransportById(int $id, array $transportUpdate)
	{
		$transport = Transport::where("id", $id);

		$transport->update(collect($transportUpdate)->except("travellers")->toArray());

		if (isset($transportUpdate["travellers"])) {
			$transport->first()->travellers()->sync($transportUpdate["travellers"]);
		}

		return $this->getTransportById($id);
	}

	public function deleteTransportById(int $id)
	{
		Transport::where("id", $id)->delete();
	}
}
