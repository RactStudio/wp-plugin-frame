<?php

namespace PluginFrame;

class Init {
    public function __construct()
    {
        error_log('Init executed........');

        // Load providers
        \add_action('plugins_loaded', [self::class, 'loadProviders']);
        
        // Initialize routes
        \add_action('init', [self::class, 'initializeRoutes']);
    }

    public static function loadProviders() {
        // Execute the wp service providers from app/Providers
        new \PluginFrame\Providers();
    }

    public static function initializeRoutes() {
        // Initialize routes from routes/ directory
        new \PluginFrame\Routes();
    }
}