<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\{User, Province, County, District, Car};

class Transport extends Model
{
	use HasFactory;

	protected $fillable = [
		"car_id",
		"start_province_id",
		"start_countie_id",
		"start_district_id",
		"finish_province_id",
		"finish_countie_id",
		"finish_district_id",
		"start_date"
	];

	public function travellers()
	{
		return $this->belongsToMany(
			User::class,
			'transports_users',
			'transports_id',
			'user_id'
		);
	}

	public function startProvince()
	{
		return $this->belongsTo(Province::class, "start_province_id", "id");
	}

	public function startCounty()
	{
		return $this->belongsTo(County::class, "start_province_id", "id");
	}

	public function startDistrict()
	{
		return $this->belongsTo(District::class, "start_province_id", "id");
	}

	public function finishProvince()
	{
		return $this->belongsTo(Province::class, "finish_province_id", "id");
	}

	public function finishCounty()
	{
		return $this->belongsTo(County::class, "finish_province_id", "id");
	}


	public function finishDistrict()
	{
		return $this->belongsTo(District::class, "finish_province_id", "id");
	}

	public function car()
	{
		return $this->belongsTo(Car::class, "car_id", "id");
	}
}
