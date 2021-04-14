<?php

namespace App\Providers;

use App\Repositories\UserRepository;
use App\Repositories\SQL\UserRepositorySQL;
use App\Repositories\SQL\VendorRepositorySQL;
use App\Repositories\VendorRepository;
use App\Repositories\SQL\TagRepositorySQL;
use App\Repositories\TagRepository;
use App\Repositories\DishRepository;
use App\Repositories\SQL\DishRepositorySQL;
use App\Repositories\OrderRepository;
use App\Repositories\SQL\OrderRepositorySQL;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider {

	/**
	 * All of the container bindings that should be registered.
	 *
	 * @var array
	 */
	public $bindings = [
		UserRepository::class => UserRepositorySQL::class,
        VendorRepository::class => VendorRepositorySQL::class,
		TagRepository::class => TagRepositorySQL::class,
		DishRepository::class => DishRepositorySQL::class,
		OrderRepository::class => OrderRepositorySQL::class,
	];

	/**
	 * Register services.
	 *
	 * @return void
	 */
	public function register() {
		//
	}

	/**
	 * Bootstrap services.
	 *
	 * @return void
	 */
	public function boot() {
		//
	}
}
