<?php

namespace PluginFrame;

/**
 * Central provider loader
 */
class Providers
{
    protected HooksProviders $hooksProviders;
    protected FiltersProviders $filtersProviders;
    protected ActionsProviders $actionsProviders;

    public function __construct()
    {
        $this->hooksProviders = new HooksProviders();
        $this->filtersProviders = new FiltersProviders();
        $this->actionsProviders = new ActionsProviders();
    }

    /**
     * Initialize all providers
     */
    public function init(string $mainFile): void
    {
        $this->hooksProviders->init($mainFile);
        $this->filtersProviders->init();
        $this->actionsProviders->init();
    }
}
