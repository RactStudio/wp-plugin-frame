<?php

namespace PluginFrame;

class Providers
{
    public function __construct()
    {
        error_log('Providers Executed........');
        // Load WP Hooks
        new HooksProviders();
        // Load WP Actions
        new ActionsProviders();
        // Load WP Filters
        new FiltersProviders();
    }
}