<?php

// Définir le mode CLI
define('IRONFLOW_CLI', true);

// Charger le bootstrap
require_once dirname(__DIR__, 1) . '/vendor/ironflow/core/src/Core/bootstrap.php';

use IronFlow\Core\Console\Kernel;
use IronFlow\Core\Container\Container;

// Charger la configuration console
$config = config('console', []);

// Créer le kernel
$container = new Container();
$kernel = new Kernel($container, $config);

return $kernel;