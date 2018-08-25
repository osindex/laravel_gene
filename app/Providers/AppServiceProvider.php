<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider {
	/**
	 * Bootstrap any application services.
	 *
	 * @return void
	 */
	public function boot() {
		Schema::defaultStringLength(191);

		Paginator::defaultView('admin.partials.paginator');

		Paginator::defaultSimpleView('admin.partials.paginator');
	}

	/**
	 * Register any application services.
	 *
	 * @return void
	 */
	public function register() {
		//
	}
}
