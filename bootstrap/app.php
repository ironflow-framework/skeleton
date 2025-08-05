<?php

use IronFlow\Core\Kernel\Application;

return Application::configure(dirname(__DIR__))
    ->loadConfiguration()  // Auto-découverte
    ->build();