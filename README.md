## Laravel 4 Page Cache Use Middleware

Add page cache with route.

````
    Route::get('/', 'PagesController@index')->before('cache.fetch')->after('cache.set');
````

###Installation

Add to composer.json

```php
"rose1988c/laravel-routecache-middleware":"dev-laravel4"

or

composer require rose1988c/laravel-routecache-middleware:dev-laravel4

```

Register the service provider by adding in the provider section in config/app.php

````
    'providers' => [
        ...
        'Rose1988c\Routecache\RoutecacheServiceProvider',
        ...
````

Just in case

````
    composer dump-autoload
````

Publish the migration and the config file

````
    // php artisan vendor:publish
    php artisan config:publish  --path="vendor/rose1988c/laravel-routecache-middleware/src/config" rose1988c/routecache
````

Add to app/filters.php

````
    Route::filter('cache.fetch', 'Rose1988c\Routecache\Routecache@fetch');
    Route::filter('cache.put', 'Rose1988c\Routecache\Routecache@put');
    Route::filter('cache.flush', 'Rose1988c\Routecache\Routecache@flush');

````

Setting Route.php

````
    Route::get('/', 'PagesController@index')->before('cache.fetch')->after('cache.set');

    or

    Route::group(array('before' => 'cache.fetch', 'after' => 'cache.put'), function(){
        Route::get('/', 'PagesController@index');
    });
````

Flush Cache

* flush        -> Flush Current Request Url

````
    Route::get('/', 'FlushController@flush')->before('cache.flush');

    ## url query with `flushurl` or default flush Referer
    url?flushurl=xxxx  # flush url
    url?flushurl=      # flush Oneself

````


## develop only

````
php artisan workbench rose1988c/routecache --resources
php artisan config:publish  --path="workbench/rose1988c/routecache/src/config" rose1988c/routecache
````