<?php

namespace App\Repository;

use App\Interfaces\ITravellerRepository;
#use App\Models\Transport;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;


class TravellerRepository implements ITravellerRepository
{
	public function getAllTravellers($type = false)
	{
		$traveller =  User::query()
			->whereHas('transports')
			//->filter()
			->with(['transports' => function ($transports) {
				$transports->with('startProvince')
					->with('startCounty')
					->with('startDistrict')
					->with('finishProvince')
					->with('finishCounty')
					->with('finishDistrict')
					->with('car.driver');
			}])
			->get();
		return $traveller;
	}
}
