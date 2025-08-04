<?php

declare(strict_types=1);

use IronFlow\Core\Http\Request;

define('IRONFLOW_START', microtime(true));

require_once __DIR__ . '/../vendor/autoload.php';

$app = require_once __DIR__ . '/../bootstrap/app.php';

$response = $app->handle(
    $request = Request::createFromGlobals()
);

$response->send();

$app->terminate($request, $response);