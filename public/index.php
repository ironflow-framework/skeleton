<?php

declare(strict_types=1);

use IronFlow\Core\Http\Request;

define('IRONFLOW_START', microtime(true));

require_once __DIR__ . '/../vendor/autoload.php';

$app = require_once __DIR__ . '/../bootstrap/app.php';

$kernel = $app->make(\IronFlow\Core\Http\Kernel::class);

$response = $kernel->handle(
    $request = Request::createFromGlobals()
);

$response->send();

$kernel->terminate($request, $response);