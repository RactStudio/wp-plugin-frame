<?php

namespace PluginFrame\Hooks;

use RactStudio\FrameStudio\Hooks\Plugin\PluginUpdateCustom as BaseUpdateCustom;

/**
 * Example custom plugin update hook.
 *
 * Use this when updating a plugin from a custom source (not wp.org).
 *
 * Demonstrates:
 * - Manual trigger for custom updates
 * - Dispatching payloads to dev callbacks
 */
class PluginUpdateCustom extends BaseUpdateCustom
{
    /**
     * Handle custom plugin update.
     *
     * @param string $pluginSlug Plugin folder/file slug
     * @param mixed $response Custom response from update server
     */
    public static function handle(string $pluginSlug, $response): void
    {
        error_log('[PluginFrame] Plugin custom update.');

        // Example: store last custom update
        update_option('pluginframe_custom_update', [
            'plugin' => $pluginSlug,
            'response' => $response,
            'time' => time()
        ]);

        // Call parent logic to keep FrameStudio base behavior
        parent::handle($pluginSlug, $response);

        // Dispatch extra payload for dev callbacks
        static::dispatch([
            'plugin' => $pluginSlug,
            'response' => $response,
            'time' => time()
        ]);
    }
}
