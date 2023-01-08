<?php

namespace App\Providers;

use App\Interfaces\ICarRepository;
use Illuminate\Support\ServiceProvider;
use App\Interfaces\IUserRepository;
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
