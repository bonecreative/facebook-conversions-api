<?php

namespace BoneCreative\FacebookConversionsApi;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;

/**
 * Class ServiceProvider
 * @package BoneCreative\LaravelCors
 */
class ServiceProvider extends BaseServiceProvider
{
	const VENDOR_PATH = 'bonecreative/facebook-conversions-api';
	const SHORT_NAME = 'bone-fb-c-api';

	/**
	 * Bootstrap the application services.
	 *
	 * @return void
	 */
	public function boot()
	{

		$this->bootConfig();
		$this->bootRoutes();

	}

	/**
	 * Register the application services.
	 *
	 * @return void
	 */
	public function register()
	{
	}


	/**
	 * @internal
	 */
	private function bootConfig()
	{
		$this->publishes([__DIR__ . '/../config/main.php' => config_path(SELF::SHORT_NAME . '.php')], 'config');
		$this->mergeConfigFrom(__DIR__ . '/../config/main.php', SELF::SHORT_NAME);
	}

	/**
	 * @internal
	 */
	private function bootRoutes()
	{
		$this->loadRoutesFrom(__DIR__ . '/../routes/main.php');
	}
}