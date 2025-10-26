<?php

namespace PluginFrame\Hooks;

use RactStudio\FrameStudio\FrameStudio;

/**
 * Central loader for all plugin hooks.
 * Will register either the override class or default FrameStudio hook.
 */
class HooksInit
{
    /**
     * List of hooks to load.
     * Key = Base class name, Value = optional override class
     */
    protected array $hooks = [
        'PluginActivate'       => PluginActivate::class,
        'PluginDeactivate'     => PluginDeactivate::class,
        'PluginUninstall'      => PluginUninstall::class,
        'PluginUpdate'         => PluginUpdate::class,
        'PluginUpdateCustom'   => PluginUpdateCustom::class,
    ];

    /**
     * Register all hooks
     *
     * @param string $mainFile Main plugin file path
     */
    public function registerHooks(string $mainFile): void
    {
        foreach ($this->hooks as $hookName => $overrideClass) {

            // Use the override if class exists, otherwise fallback to FrameStudio default
            $baseClass = "\\RactStudio\\FrameStudio\\Hooks\\Plugin\\{$hookName}";

            if (class_exists($overrideClass)) {
                $fqcn = $overrideClass;
            } else {
                $fqcn = $baseClass;
            }

            if (method_exists($fqcn, 'register')) {
                $fqcn::register($mainFile);
            }
        }
    }
}
