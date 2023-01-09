<?php

namespace App\Repository;

use App\Interfaces\IUserRepository;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class UserRepository implements IUserRepository
{
	public function getAllUsers()
	{
		return User::query()
			->with('types')
			->get();
	}

	public function getUserById(int $id)
	{
		return User::where('id', $id)->with('types')->firstOrFail();
	}


	public function createNewUser($newUser)
	{
		$user =  User::create($newUser);

		$user->types()->attach($newUser["types"]);

		return $this->getUserById($user->id);
	}

	public function updateUserById(int $id, array $userArray)
	{
		$user = User::where("id", $id);

		$user->update(collect($userArray)->only("email", "name")->toArray());

		if (isset($userArray["types"])) {
			$user->first()->types()->sync($userArray["types"]);
		}

		return $this->getUserById($id);
	}

	public function deleteUserById(int $id)
	{
		User::where("id", $id)->delete();
	}
	public function login($credentials)
	{
		$user = User::where('email', $credentials["email"])->first();

		if (!$user || !Hash::check($credentials["password"], $user->password)) {
			throw ValidationException::withMessages([
				'email' => ['The provided credentials are incorrect.'],
			]);
		}
		Auth::loginUsingId($user->id);
		return $user->createToken('web')->plainTextToken;
	}

	public function logout()
	{
		auth()->logout();
	}
}
