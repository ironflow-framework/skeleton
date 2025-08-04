<?php

use IronFlow\Core\Application;

return Application::configure(dirname(__DIR__))
    ->loadConfiguration()  // Auto-découverte
    ->build();