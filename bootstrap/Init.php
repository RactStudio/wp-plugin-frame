<?php

namespace PluginFrame;

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) { exit; }

class Init
{
    protected Providers $providers;
    protected Routes $routes;

    public function __construct()
    {
        $this->providers = new Providers();
        $this->routes = new Routes();
    }

    public function initialize()
    {
        // Load providers (plugins_loaded)
        $this->initializeProviders();
        
        // Initialize routes

        \add_action('init', function()
        {
            $this->initializeRoutes();
        }, 5); // Early priority
    }

    private function initializeProviders()
    {
        // Initialize the wp service providers from app/Providers
        $this->providers->init(PLUGIN_FRAME_FILE);
    }

    private function initializeRoutes() {
        // Initialize the wp routes from routes/ directory
        $this->routes->registerRoutes();
    }
}