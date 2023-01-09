<?php

namespace App\Interfaces;

interface ITransportRepository
{
	public function getAllTransports();

	public function getTransportById(int $id);

	public function createTransport(array $transport);

	public function updateTransportById(int $id, array $transport);

	public function deleteTransportById(int $id);
}
