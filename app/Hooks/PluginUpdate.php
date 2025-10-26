<?php

namespace PluginFrame\Hooks;

use RactStudio\FrameStudio\Hooks\Plugin\PluginUpdate as BaseUpdate;

/**
 * Example plugin update hook.
 *
 * Demonstrates:
 * - Custom logic after WordPress plugin update
 * - Dispatching payload for developer callbacks
 */
class PluginUpdate extends BaseUpdate
{
    /**
     * Handle plugin update event.
     *
     * @param \WP_Upgrader $upgrader
     * @param array $options
     */
    public static function handle($upgrader, array $options): void
    {
        // Check that this is a plugin update
        if (empty($options['type']) || $options['type'] !== 'plugin') {
            return;
        }

        // Example: log updated plugin slugs
        if (!empty($options['plugins']) && is_array($options['plugins'])) {
            foreach ($options['plugins'] as $plugin) {
                error_log('[PluginFrame] Plugin updated: ' . $plugin);
            }
        }

        // Call parent logic
        parent::handle($upgrader, $options);

        // Dispatch additional payload for callbacks
        static::dispatch([
            'plugins' => $options['plugins'] ?? [],
            'time' => time()
        ]);
    }
}
