<?php

namespace App\Models;

use App\Models\TransportsUsers;
use Illuminate\Database\Eloquent\Model;
use App\Models\{User, Province, County, District};
use Illuminate\Database\Eloquent\Factories\HasFactory;

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

    public function type()
    {
        return $this->hasOneThrough(
            UserTypes::class,
            TransportsUsers::class,
            'user_id',
            'id',
            'id',
            'user_types_id',
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
}
