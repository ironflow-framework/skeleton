<?php

declare(strict_types=1);

// Fichier: config/app.php
// Configuration principale de l'application

return [
    'name' => env('APP_NAME', 'IronFlow App'),
    'env' => env('APP_ENV', 'production'),
    'debug' => env('APP_DEBUG', false),
    'url' => env('APP_URL', 'http://localhost'),
    'timezone' => env('APP_TIMEZONE', 'UTC'),
    
    'providers' => require __DIR__ .'/../bootstrap/providers.php',
];