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

	}

	/**
	 * Register the application services.
	 *
	 * @return void
	 */
	public function register()
	{

		$this->app->singleton(Client::class, function ()
		{
			$url    = 'https://graph.facebook.com/v13.0/{PIXEL_ID}/events';
			$config = config(self::SHORT_NAME);

			return new Client($url, $config['pixel_id'], $config['token']);
		});
	}


	/**
	 * @internal
	 */
	private function bootConfig()
	{
		$this->publishes([__DIR__ . '/../config/main.php' => config_path(SELF::SHORT_NAME . '.php')], 'config');
		$this->mergeConfigFrom(__DIR__ . '/../config/main.php', SELF::SHORT_NAME);
	}

}