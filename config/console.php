<?php

declare(strict_types=1);

/**
 * Configuration du système de console IronFlow
 * 
 * Ce fichier définit la configuration pour le kernel console,
 * les commandes personnalisées et les paramètres de logging.
 */

return [
    /*
    |--------------------------------------------------------------------------
    | Application Console
    |--------------------------------------------------------------------------
    |
    | Configuration de base de l'application console
    |
    */
    'name' => env('APP_NAME', 'IronFlow') . ' Forge',
    'version' => '1.0.0',
    'timezone' => env('APP_TIMEZONE', 'UTC'),

    /*
    |--------------------------------------------------------------------------
    | Mode Debug
    |--------------------------------------------------------------------------
    |
    | Active le mode debug pour afficher plus d'informations lors de l'exécution
    | des commandes. Utile pour le développement.
    |
    */
    'debug' => env('APP_DEBUG', false),

    /*
    |--------------------------------------------------------------------------
    | Configuration du Logging
    |--------------------------------------------------------------------------
    |
    | Paramètres pour le système de logging des commandes console
    |
    */
    'logging' => [
        'enabled' => true,
        'path' => 'storage/logs/console.log',
        'level' => env('LOG_LEVEL', 'info'), // debug, info, notice, warning, error, critical, alert, emergency
        'max_files' => 7, // Nombre de fichiers de logs à conserver
        'format' => '[%datetime%] %channel%.%level_name%: %message% %context% %extra%',
        'date_format' => 'Y-m-d H:i:s',
    ],

    /*
    |--------------------------------------------------------------------------
    | Configuration des Templates
    |--------------------------------------------------------------------------
    |
    | Paramètres pour la génération de fichiers depuis des templates
    |
    */
    'templates' => [
        'path' => 'core/Console/Commands/Templates',
        'base_namespace' => 'App',
        'force_overwrite' => false,
        'backup_existing' => true,
    ],

    /*
    |--------------------------------------------------------------------------
    | Commandes Personnalisées
    |--------------------------------------------------------------------------
    |
    | Liste des commandes personnalisées à enregistrer automatiquement.
    | Chaque classe doit étendre BaseCommand ou Command de Symfony.
    |
    */
    'commands' => [
        // Exemple :
        // App\Console\Commands\CustomCommand::class,
        // App\Console\Commands\DeployCommand::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Configuration du Serveur de Développement
    |--------------------------------------------------------------------------
    |
    | Paramètres par défaut pour la commande serve
    |
    */
    'server' => [
        'host' => env('DEV_SERVER_HOST', 'localhost'),
        'port' => env('DEV_SERVER_PORT', 8000),
        'auto_port' => true,
        'open_browser' => false,
        'document_root' => 'public',
        'router_script' => null, // Chemin vers un script de routage personnalisé
        'environment_variables' => [
            'APP_ENV' => 'development',
            'APP_DEBUG' => 'true',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Configuration de la Base de Données
    |--------------------------------------------------------------------------
    |
    | Paramètres pour les commandes de migration et de seeding
    |
    */
    'database' => [
        'migrations_path' => 'database/migrations',
        'seeds_path' => 'database/seeds',
        'factories_path' => 'database/factories',
        'backup_before_migrate' => true,
        'migration_table' => 'migrations',
    ],

    /*
    |--------------------------------------------------------------------------
    | Générateurs de Code
    |--------------------------------------------------------------------------
    |
    | Configuration pour les commandes make:*
    |
    */
    'generators' => [
        'controllers' => [
            'path' => 'app/Controllers',
            'namespace' => 'App\\Controllers',
            'suffix' => 'Controller',
            'base_class' => 'IronFlow\\Core\\Http\\Controller',
        ],
        'models' => [
            'path' => 'app/Models',
            'namespace' => 'App\\Models',
            'suffix' => '',
            'base_class' => 'IronFlow\\Core\\Database\\Model',
        ],
        'modules' => [
            'path' => 'app/Modules',
            'namespace' => 'App\\Modules',
            'structure' => [
                'Controllers',
                'Models',
                'Views',
                'Services',
                'Requests',
                'Resources'
            ],
        ],
        'migrations' => [
            'path' => 'database/migrations',
            'table_prefix' => '',
            'timestamp_format' => 'Y_m_d_His',
        ],
        'seeders' => [
            'path' => 'database/seeds',
            'namespace' => 'Database\\Seeds',
            'suffix' => 'Seeder',
            'base_class' => 'IronFlow\\Core\\Database\\Seeder',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Hooks et Extensions
    |--------------------------------------------------------------------------
    |
    | Configuration pour les hooks et extensions du système de console
    |
    */
    'hooks' => [
        'before_command' => [
            // Callbacks à exécuter avant chaque commande
        ],
        'after_command' => [
            // Callbacks à exécuter après chaque commande
        ],
        'on_error' => [
            // Callbacks à exécuter en cas d'erreur
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Optimisations
    |--------------------------------------------------------------------------
    |
    | Paramètres d'optimisation pour améliorer les performances
    |
    */
    'optimizations' => [
        'cache_templates' => env('APP_ENV') === 'production',
        'preload_commands' => false,
        'memory_limit' => '256M',
        'max_execution_time' => 300, // 5 minutes
    ],

    /*
    |--------------------------------------------------------------------------
    | Sécurité
    |--------------------------------------------------------------------------
    |
    | Paramètres de sécurité pour les commandes console
    |
    */
    'security' => [
        'allowed_users' => [], // Vide = tous les utilisateurs autorisés
        'restricted_commands' => [
            // Liste des commandes nécessitant des privilèges spéciaux
        ],
        'log_all_commands' => true,
        'mask_sensitive_options' => [
            'password',
            'secret',
            'key',
            'token',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Intégrations Externes
    |--------------------------------------------------------------------------
    |
    | Configuration pour les intégrations avec des services externes
    |
    */
    'integrations' => [
        'git' => [
            'enabled' => true,
            'auto_commit_generated_files' => false,
            'commit_message_template' => 'Generated by IronFlow Forge: {command}',
        ],
        'ide' => [
            'open_generated_files' => false,
            'editor_command' => env('EDITOR', 'code'), // VS Code par défaut
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Notifications
    |--------------------------------------------------------------------------
    |
    | Configuration pour les notifications système
    |
    */
    'notifications' => [
        'enabled' => env('APP_ENV') === 'development',
        'success_sound' => true,
        'error_sound' => true,
        'desktop_notifications' => false,
    ],
];