<?php

namespace App\Interfaces;

interface IUserRepository
{
	public function getAllUsers();

	public function getUserById(int $id);

	public function createNewUser(array $user);

	public function updateUserById(int $id, array $user);

	public function deleteUserById(int $id);

	public function login(array $credentials);

	public function logout();
}
