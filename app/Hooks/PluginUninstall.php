<?php

namespace PluginFrame\Hooks;

use RactStudio\FrameStudio\Hooks\Plugin\PluginUninstall as BaseUninstall;

/**
 * Example plugin uninstall hook.
 *
 * Demonstrates:
 * - Custom cleanup logic
 * - Using dispatch for callbacks
 */
class PluginUninstall extends BaseUninstall
{
    public static function handle(): void
    {
        error_log('[PluginFrame] Plugin uninstalled.');

        // Custom uninstall logic
        delete_option('pluginframe_activated_at');
        delete_option('pluginframe_deactivated_at');

        // Call parent logic
        parent::handle();

        // Dispatch payload for additional dev callbacks
        static::dispatch([
            'custom' => true,
            'time' => time()
        ]);
    }
}
