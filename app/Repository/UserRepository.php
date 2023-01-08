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
			->get();
	}

	public function getUserById(int $id)
	{
		return User::where('id', $id)->firstOrFail();
	}


	public function create($user)
	{
		return User::create($user);
	}

	public function updateUserById(int $id, array $userArray)
	{
		$user = User::findOrFail($id);
		$user->update($userArray);

		return $user;
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
