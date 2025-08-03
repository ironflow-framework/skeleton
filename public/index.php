<?php
// Fichier: public/index.php
// Point d'entrée de l'application

declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';

use IronFlow\Core\IronKernel;
use IronFlow\Core\Container\Container;
use IronFlow\Core\Http\Request;

// Créer le container DI
$container = new Container();

// Créer le kernel de l'application
$kernel = new IronKernel($container);

// Charger la configuration de l'application
require_once __DIR__ . '/../bootstrap/app.php';

// Traiter la requête HTTP
$request = Request::createFromGlobals();
$response = $kernel->handle($request);

// Envoyer la réponse
$response->send();

// ---

// Fichier: bootstrap/app.php
// Configuration et initialisation de l'application

declare(strict_types=1);

use IronFlow\Core\Database\Model;
use App\Modules\Blog\BlogModuleProvider;
use App\Modules\Auth\AuthModuleProvider;
use IronFlow\Core\Http\Middleware\CorsMiddleware;
use IronFlow\Core\Http\Middleware\LoggingMiddleware;

// Configuration de la base de données
$dbConfig = require __DIR__ . '/../config/database.php';
$pdo = new PDO(
    $dbConfig['dsn'],
    $dbConfig['username'],
    $dbConfig['password'],
    $dbConfig['options']
);

// Configurer l'ORM
Model::setPdo($pdo);

// Enregistrer les middleware globaux
$kernel->addMiddleware(CorsMiddleware::class);
$kernel->addMiddleware(LoggingMiddleware::class);

// Enregistrer les modules
$kernel->registerModule(new BlogModuleProvider());
$kernel->registerModule(new AuthModuleProvider());

// Charger les routes globales
$kernel->getRouter()->loadRoutes(__DIR__ . '/../routes/web.php');

// ---

// Fichier: config/app.php
// Configuration principale de l'application

return [
    'name' => env('APP_NAME', 'IronFlow App'),
    'env' => env('APP_ENV', 'production'),
    'debug' => env('APP_DEBUG', false),
    'url' => env('APP_URL', 'http://localhost'),
    'timezone' => env('APP_TIMEZONE', 'UTC'),
    
    'providers' => [
        App\Providers\AppServiceProvider::class,
        App\Providers\RouteServiceProvider::class,
    ],
];

// ---

// Fichier: config/database.php
// Configuration de la base de données

return [
    'default' => env('DB_CONNECTION', 'mysql'),
    
    'connections' => [
        'mysql' => [
            'driver' => 'mysql',
            'host' => env('DB_HOST', '127.0.0.1'),
            'port' => env('DB_PORT', '3306'),
            'database' => env('DB_DATABASE', 'ironflow'),
            'username' => env('DB_USERNAME', 'root'),
            'password' => env('DB_PASSWORD', ''),
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
        ],
        
        'sqlite' => [
            'driver' => 'sqlite',
            'database' => env('DB_DATABASE', database_path('database.sqlite')),
        ],
    ],
    
    // Configuration PDO directe pour l'exemple
    'dsn' => env('DB_CONNECTION', 'mysql') === 'sqlite' 
        ? 'sqlite:' . (__DIR__ . '/../database/database.sqlite')
        : 'mysql:host=' . env('DB_HOST', '127.0.0.1') . ';dbname=' . env('DB_DATABASE', 'ironflow'),
    'username' => env('DB_USERNAME', 'root'),
    'password' => env('DB_PASSWORD', ''),
    'options' => [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
    ],
];

