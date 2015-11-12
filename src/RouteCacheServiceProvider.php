<?php
/**
 * RouteCacheServiceProvider.php
 * 
 * @author: Cyw
 * @email: chenyunwen01@bianfeng.com
 * @created: 2015/11/12 20:13
 * @logs: 
 *       
 */
namespace Rose1988c\RouteCache;

use Illuminate\Support\ServiceProvider;

class RouteCacheServiceProvider extends ServiceProvider
{
    protected $defer = false;

    /**
     * Register
     * @return void
     */
    public function boot()
    {
        $this->publishes([
        __DIR__.'/../resources/config/routecache.php' => config_path('routecache.php'),
        ]);
    }
}
