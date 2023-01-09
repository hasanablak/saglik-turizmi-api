<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Interfaces\ITravellerRepository;

class TravellerController extends Controller
{
	protected $traveller;

	public function __construct(ITravellerRepository $traveller)
	{
		$this->traveller = $traveller;
	}

	public function index()
	{
		return $this->traveller->getAllTravellers();
	}
}
