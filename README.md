## Laravel Page Cache Use Middleware

###Installation
Add to composer.json

```php
"rose1988c/laravel-routecache-middleware":"dev-master"
```


Register the service provider by adding in the provider section in config/app.php

```php
'providers' => [
    ...
    Rose1988c\RouteCache\RouteCacheServiceProvider::class
    ...
```

Just in case

```php
composer dump-autoload
```

Publish the migration and the config file

```php
php artisan vendor:publish
```

Add to Kernel.php

```php
'cache' => \Rose1988c\RouteCache\CacheMiddleware::class,
```

````
    route

    middleware => 'cache:20'
````