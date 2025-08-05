<?php

declare(strict_types= 1);

use IronFlow\Core\Http\Response;
use IronFlow\Core\Http\Routing\Router;

$router = new Router();

// Routes API
$router->group(['prefix' => 'api/v1'], function(Router $router) {
    
    $router->get('/health', function() {
        return Response::json([
            'status' => 'ok',
            'timestamp' => time()
        ]);
    })->name('api.health');
    
    $router->get('/info', function() {
        return Response::json([
            'php_version' => PHP_VERSION,
            'ironflow_version' => '1.0.0',
            'memory_usage' => memory_get_usage(true),
            'peak_memory' => memory_get_peak_usage(true)
        ]);
    })->name('api.info');
    
});