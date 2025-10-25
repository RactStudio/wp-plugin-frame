<?php

namespace PluginFrame;

class HooksProviders
{
    public function __construct()
    {
        // Register activation/deactivation hooks
        \register_activation_hook(PLUGIN_FRAME_FILE, [self::class, 'activate']);
        \register_deactivation_hook(PLUGIN_FRAME_FILE, [self::class, 'deactivate']);
    }

    public static function activate()
    {

    }

    public static function deactivate()
    {
        
    }
}