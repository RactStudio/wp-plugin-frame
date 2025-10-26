<?php

namespace PluginFrame\Hooks;

use RactStudio\FrameStudio\Hooks\Plugin\PluginDeactivate as BaseDeactivate;

/**
 * Example plugin deactivation hook.
 *
 * Demonstrates:
 * - Overriding handle() for custom deactivation logic
 * - Dispatching payload for dev callbacks
 */
class PluginDeactivate extends BaseDeactivate
{
    public static function handle(): void
    {
        error_log('[PluginFrame] Plugin deactivated.');

        // Custom deactivation logic
        update_option('pluginframe_deactivated_at', time());

        // Call parent logic
        parent::handle();

        // Dispatch extra payload for attached callbacks
        static::dispatch([
            'custom' => true,
            'time' => time()
        ]);
    }
}
