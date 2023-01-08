<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\UserTypes;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		if (config('admin.admin_name')) {
			$user = User::firstOrCreate(
				['email' => config('admin.admin_email')],
				[
					'name' => config('admin.admin_name'),
					'password' => config('admin.admin_password'),
					'email_verified_at' => now(),
					'remember_token' => Str::random(10),
				]
			);

			$typeOfadmin = UserTypes::whereName('admin')->firstOrFail();

			$user->types()->attach($typeOfadmin->id);
		}

		$users = User::factory(10)->create();
		$types = UserTypes::where('name', '!=', 'admin')->get()->pluck("id");

		foreach ($users as $user) {
			$user->types()->attach($types->random());
		}
	}
}
