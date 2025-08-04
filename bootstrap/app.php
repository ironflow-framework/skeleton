<?php

use IronFlow\Core\Application;


return Application::setup(dirname(__DIR__))
  ->withRoutes([
    '/routes/web.php'
  ])
  ->withMiddlewares([
    \IronFlow\Core\Http\Middleware\CorsMiddleware::class,
    \IronFlow\Core\Http\Middleware\LoggingMiddleware::class
  ])
  ->boot();;
