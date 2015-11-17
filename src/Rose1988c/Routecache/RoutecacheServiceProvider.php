<?php
/**
 * RoutecacheServiceProvider.php
 *
 * @author: Cyw
 * @email: chenyunwen01@bianfeng.com
 * @created: 2015/11/17 12:35
 * @logs:
 *
 */
namespace Rose1988c\Routecache;

use Illuminate\Support\ServiceProvider;

class RoutecacheServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Bootstrap the application events.
	 *
	 * @return void
	 */
	public function boot()
	{
		$this->package('rose1988c/routecache');
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app['routecache'] = $this->app->share(function($app)
		{
			return new Routecache;
		});
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array('routecache');
	}
}
