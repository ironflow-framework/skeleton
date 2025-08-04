<?php

declare(strict_types=1);

use IronFlow\Core\Http\Request;

define('IRONFLOW_START', microtime(true));

// Register the Composer autoloader...
require __DIR__.'/../vendor/autoload.php';

// Charger la configuration de l'application
$app = require_once __DIR__ . '/../bootstrap/app.php';

// Traiter la requête HTTP
$response = $app->handle(Request::createFromGlobals());

// Envoyer la réponse
$response->send();
