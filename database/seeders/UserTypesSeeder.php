<?php

namespace Database\Seeders;

use App\Models\UserTypes;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserTypesSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	protected $types = [
		"admin",
		"hasta",
		"hastane personeli"
	];
	
	public function run()
	{
		foreach ($this->types as $type) {
			UserTypes::firstOrCreate(["name" => $type]);
		}
	}
}
