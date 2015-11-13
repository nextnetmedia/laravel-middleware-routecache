## Laravel Page Cache Use Middleware

Add page cache with route.

The cache is best not to write in the program logic inside, to find a cache is very tired, I suggest that the cache in the routing

缓存最好不要写在程序逻辑里面，查找一个缓存非常累，我建议缓存放在路由里面, 使用方法如下：

````
    Route::group(['middleware' => 'cache:10'], function(){
        Route::get('/', 'HomeController@index');
    });
````

###Installation

Add to composer.json

```php
"rose1988c/laravel-routecache-middleware":"dev-master"

or

composer require rose1988c/laravel-routecache-middleware:dev-master

```

Register the service provider by adding in the provider section in config/app.php

````
    'providers' => [
        ...
        Rose1988c\RouteCache\RouteCacheServiceProvider::class
        ...
````

Just in case

````
    composer dump-autoload
````

Publish the migration and the config file

````
    php artisan vendor:publish
````

Add to app\Http\Kernel.php

````
    'cache' => 'Rose1988c\RouteCache\CacheMiddleWare',
````

Setting Route.php

````
    // set cache lifetime 10
    Route::group(['middleware' => 'cache:10'], function(){
        Route::get('/', 'DemoController@index');
    });
````