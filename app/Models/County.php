<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class County extends Model
{
	use HasFactory;
	public $timestamps = false;

	public function district()
	{
		return $this->hasMany(District::class);
	}
}
