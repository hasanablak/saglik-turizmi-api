<?php

namespace App\Filters\TravellerFilters;

class UserTypeFilter
{
	public function filter($builder, $value)
	{
		return $builder->where('is_complated', $value);
	}
}
