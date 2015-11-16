## Laravel 4 Page Cache Use Middleware

Add page cache with route.

````
    Route::get('/', 'PagesController@index')->before('cache.fetch')->after('cache.set');
````

###Installation

Add to composer.json

```php
"rose1988c/laravel-routecache-middleware":"laravel4"

or

composer require rose1988c/laravel-routecache-middleware:laravel4

```

Register the service provider by adding in the provider section in config/app.php

````
    'providers' => [
        ...
        Rose1988c\RouteCache\CacheFilter
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

Add to app/filters.php

````
    Route::filter('cache.fetch', 'Rose1988c\RouteCache\CacheFilter@fetch');
    Route::filter('cache.put', 'Rose1988c\RouteCache\CacheFilter@put');
    Route::filter('cache.flush', 'Rose1988c\RouteCache\CacheFilter@flush');

````

Setting Route.php

````
    Route::get('/', 'PagesController@index')->before('cache.fetch')->after('cache.set');
````

Flush Cache

* flush        -> Flush Current Request Url

````
    Route::get('/', 'PagesController@index')->before('cache.flush');

````