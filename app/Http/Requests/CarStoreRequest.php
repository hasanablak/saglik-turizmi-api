<?php

namespace App\Http\Requests;

use App\Models\Province;
use Illuminate\Foundation\Http\FormRequest;

class CarStoreRequest extends FormRequest
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
			"seats_count" => ["required", "integer", "max:16", "min:6"],
			"driver_id" => ["required", "exists:users,id"],
			"plate"		=> ["required", "unique:cars,plate", "min:8", "max:10"],
		];
	}

	protected function prepareForValidation()
	{
		$this->merge([
			'plate' => str_replace(' ', '', $this->plate),
		]);
	}
}
