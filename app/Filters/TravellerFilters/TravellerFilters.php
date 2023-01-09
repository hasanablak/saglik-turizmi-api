<?php

namespace App\Filters\TravellerFilters;

use App\Filters\AbstractFilter;
use App\Filters\TravellerFilters\UserTypeFilter;

class TravellerFilters extends AbstractFilter
{
	protected $filters = [
		'type' => UserTypeFilter::class,
	];
}
