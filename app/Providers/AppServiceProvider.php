<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;


use App\Interfaces\IUserRepository;
use App\Interfaces\ICarRepository;
use App\Interfaces\ITransportRepository;

use App\Repository\TransportRepository;
use App\Repository\CarRepository;
use App\Repository\UserRepository;

class AppServiceProvider extends ServiceProvider
{
	/**
	 * Register any application services.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app->bind(IUserRepository::class, UserRepository::class);

		$this->app->bind(ICarRepository::class, CarRepository::class);

		$this->app->bind(ITransportRepository::class, TransportRepository::class);
	}

	/**
	 * Bootstrap any application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		//
	}
}
