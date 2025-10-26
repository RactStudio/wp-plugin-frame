<?php

namespace PluginFrame\Hooks;

use RactStudio\FrameStudio\Hooks\Plugin\PluginActivate as BaseActivate;

/**
 * Example plugin activation hook.
 *
 * Demonstrates:
 * - Overriding handle() for custom activation logic
 * - Attaching additional callbacks via ::on()
 */
class PluginActivate extends BaseActivate
{
    /**
     * Custom handle logic called when plugin is activated.
     */
    public static function handle(): void
    {
        error_log('[PluginFrame] Plugin activated.');

        // Custom activation logic
        update_option('pluginframe_activated_at', time());

        // Call parent handle() to preserve FrameStudio default behavior
        parent::handle();

        // Dispatch extra payload for attached callbacks
        static::dispatch([
            'custom' => true,
            'time' => time()
        ]);
    }
}
