<?php

namespace PluginFrame;

use PluginFrame\Hooks\HooksInit;

/**
 * Load all plugin hooks via HooksInit
 */
class HooksProviders
{
    protected HooksInit $hooksInit;

    public function __construct()
    {
        $this->hooksInit = new HooksInit();
    }

    /**
     * Initialize all hooks
     *
     * @param string $mainFile Main plugin file path
     */
    public function init(string $mainFile): void
    {
        $this->hooksInit->registerHooks($mainFile);
    }
}
