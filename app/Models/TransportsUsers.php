<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class TransportsUsers extends Pivot
{
	public function types()
	{
		return $this->hasOne(UserTypes::class, "id", "user_types_id");
	}
}
