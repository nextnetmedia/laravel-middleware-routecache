## Laravel Page Cache Use Middleware

Add page cache with route.

页面缓存最好不要写在程序里面，程序逻辑里面查找一个缓存，去掉一个缓存，很费劲，用下面这种方式缓存页面

````
    Route::group(['middleware' => 'cache:10'], function(){
        Route::get('/', 'WealthBalanceController@index'); // route - 财富平衡首页
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