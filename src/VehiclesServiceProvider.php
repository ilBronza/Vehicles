<?php

namespace IlBronza\Vehicles;

use IlBronza\Vehicles\Models\Vehicle;
use IlBronza\Vehicles\Models\Type;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\ServiceProvider;

class VehiclesServiceProvider extends ServiceProvider
{
	/**
	 * Perform post-registration booting of services.
	 *
	 * @return void
	 */
	public function boot() : void
	{
		Relation::morphMap([
			'Vehicle' => Vehicle::getProjectClassName(),
			'Type' => Type::getProjectClassName()
		]);

		$this->loadTranslationsFrom(__DIR__ . '/../resources/lang', 'vehicles');
		// $this->loadViewsFrom(__DIR__.'/../resources/views', 'ilbronza');
		$this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
		$this->loadRoutesFrom(__DIR__ . '/../routes/vehicles.php');

		// Publishing is only necessary when using the CLI.
		if ($this->app->runningInConsole())
		{
			$this->bootForConsole();
		}
	}

	/**
	 * Register any package services.
	 *
	 * @return void
	 */
	public function register() : void
	{
		$this->mergeConfigFrom(__DIR__ . '/../config/vehicles.php', 'vehicles');

		// Register the service the package provides.
		$this->app->singleton('vehicles', function ($app)
		{
			return new Vehicles;
		});
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return ['vehicles'];
	}

	/**
	 * Console-specific booting.
	 *
	 * @return void
	 */
	protected function bootForConsole() : void
	{
		// Publishing the configuration file.
		$this->publishes([
			__DIR__ . '/../config/vehicles.php' => config_path('vehicles.php'),
		], 'vehicles.config');

		// Publishing the views.
		/*$this->publishes([
			__DIR__.'/../resources/views' => base_path('resources/views/vendor/ilbronza'),
		], 'vehicles.views');*/

		// Publishing assets.
		/*$this->publishes([
			__DIR__.'/../resources/assets' => public_path('vendor/ilbronza'),
		], 'vehicles.assets');*/

		// Publishing the translation files.
		/*$this->publishes([
			__DIR__.'/../resources/lang' => resource_path('lang/vendor/ilbronza'),
		], 'vehicles.lang');*/

		// Registering package commands.
		// $this->commands([]);
	}
}
