<?php

declare(strict_types=1);

namespace App\Modules\Blog;

use IronFlow\Core\Module\ModuleProvider;
use IronFlow\Core\Container\Container;
use IronFlow\Core\Module\ModuleInfo;

/**
 * Blog Module Provider
 */
class BlogModuleProvider extends ModuleProvider
{
    /**
     * Enregistre les services du module
     */
    public function register(Container $container): void
    {
        // Enregistrer les services spécifiques au module
        // $container->singleton(BlogService::class);
    }

    /**
     * Boot le module après l'enregistrement
     */
    public function boot(Container $container): void
    {
        // Charger les routes du module
        $this->loadRoutes(__DIR__ . '/routes/routes.php');
        
        // Charger les vues (si nécessaire)
        // $this->loadViews(__DIR__ . '/resources/views', 'blog');
        
        // Autres initialisations
    }

    /**
     * Retourne le nom du module
     */
    public function getName(): string
    {
        return 'Blog';
    }

    public function getModuleInfo(): ModuleInfo
    {
        return new ModuleInfo(
            name: 'Blog',
            description: 'Module de gestion de blog',
            version: '1.0.0',
        );
    }
}
