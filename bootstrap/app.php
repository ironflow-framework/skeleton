<?php

declare(strict_types=1);

require_once __DIR__ . '/../vendor/ironflow/framework/src/helpers.php';

use IronFlow\Core\Application\Application;

// Création de l'application
$app = Application::getInstance(dirname(__DIR__))
   ->withRouter('routes/web.php', 'routes/api.php');

// Initialisation de l'application
$app->bootstrap();

return $app;
