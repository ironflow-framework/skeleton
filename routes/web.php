<?php

// Fichier: routes/web.php
// Routes globales de l'application

use IronFlow\Core\Http\Response;
use IronFlow\Core\Http\Routing\Router;

$router = new Router();

// Route d'accueil
$router->get('/', function() {
    return Response::json([
        'message' => 'Welcome to IronFlow!',
        'version' => '1.0.0',
        'timestamp' => date('Y-m-d H:i:s')
    ]);
})->name('home');
