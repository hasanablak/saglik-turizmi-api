<?php

namespace App\Filters\TravellerFilters;

use Illuminate\Database\Eloquent\Builder;


class UserTypeFilter
{
	public function filter($builder, $value)
	{
		return $builder->whereHas('transports', function (Builder $query) use ($value) {
			$query->where('transports_users.user_types_id', $value);
		});
	}
}
