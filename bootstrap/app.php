<?php

// Charger le bootstrap IronFlow avant tout
require_once dirname(__DIR__, 1) . '/vendor/ironflow/core/src/Core/bootstrap.php';

// Maintenant vous pouvez utiliser les fonctions env() et autres
use IronFlow\Core\Kernel\Application;


$app = Application::configure(dirname(__DIR__))
    ->loadConfiguration()
    ->autoDiscoverRoutes() // Ajout auto-chargement des routes
    ->build();

return $app;
