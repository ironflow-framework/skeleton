<?php

// Fichier: routes/web.php
// Routes globales de l'application



/** @var Router $router */

use IronFlow\Http\Response;

// Route d'accueil
$router->get('/', function() {
    return Response::json([
        'message' => 'Welcome to IronFlow!',
        'version' => '1.0.0',
        'timestamp' => date('Y-m-d H:i:s')
    ]);
})->name('home');

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