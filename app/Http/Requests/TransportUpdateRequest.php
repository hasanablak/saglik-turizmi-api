<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TransportUpdateRequest extends FormRequest
{
	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array<string, mixed>
	 */
	public function rules()
	{
		return [
			"car_id"			=>	"exists:cars,id",
			"start_province_id"	=>	"exists:provinces,id",
			"start_countie_id"	=>	"exists:counties,id",
			"start_district_id"	=>	"exists:districts,id",
			"finish_province_id" =>	"exists:provinces,id",
			"finish_countie_id"	=>	"exists:counties,id",
			"finish_district_id" =>	"exists:districts,id",
			"travellers"		=>	"array|exists:users,id",
			"start_date"		=>	"date"
		];
	}
}
