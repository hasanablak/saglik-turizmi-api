<?php

namespace App\Repository;

use App\Interfaces\ITravellerRepository;
#use App\Models\Transport;
use App\Models\User;

class TravellerRepository implements ITravellerRepository
{
	public function getAllTravellers()
	{
		return User::whereHas('transports')->with('transports')->get();
	}
}
