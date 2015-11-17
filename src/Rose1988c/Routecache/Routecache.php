<?php
/**
 * Routecache.php
 *
 * @author: Cyw
 * @email: chenyunwen01@bianfeng.com
 * @created: 2015/11/17 10:36
 * @logs:
 *
 */
namespace Rose1988c\RouteCache;

use Cache;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Route;
use Str;
use Config;

/**
 * Simple route caching
 *
 * USAGE:
 * Route::get('/', 'PagesController@index')->before('cache.fetch')->after('cache.set');
 */
class Routecache
{

    /**
     * If route is cached, use that instead
     *
     * @param Route $route
     * @param Request $request
     */
    public function fetch(Route $route, Request $request)
    {
        if (Config::get('routecache::enabled')) {
            $key = $this->makeCacheKey($request->url());
            if (Cache::has($key)) return Cache::get($key);
        }
    }

    /**
     * Cache route
     *
     * @param Route $route
     * @param Request $request
     * @param Response $response
     */
    public function put(Route $route, Request $request, Response $response)
    {
        if (Config::get('routecache::enabled')) {
            $key = $this->makeCacheKey($request->url());
            if (!Cache::has($key)) Cache::put($key, $response->getContent(), Config::get('routecache::lifetime'));
        }
    }

    /**
     * forget route
     *
     * @param Route $route
     * @param Request $request
     * @param Response $response
     */
    public function flush(Route $route, Request $request)
    {
        if (Config::get('routecache::enabled')) {

            if ($request->query('flushurl') != false)
            {
                if (empty($request->query('flushurl')))
                {
                    $key = $this->makeCacheKey($request->url());
                } else {
                    $key = $this->makeCacheKey($request->query('flushurl'));
                }
            } else {
                // 默认删除上一次缓存
                $key = $this->makeCacheKey($request->header('Referer'));
            }
            Cache::forget($key);
        }
    }

    /**
     * Create a unique cache identifier/key
     *
     * @param string $url
     */
    protected function makeCacheKey($url)
    {

        return 'route-' . Str::slug($url);
    }
}