<?php

namespace PluginFrame;

/**
 * Load all php files (composer) ASAP the requst cycle is started. So, if needed can be call / execute asap as well.
 * Any / All WP Plugin Frame php classes / functions must execute after init action is completed
 */

class Boot
{
    public function __construct()
    {
        error_log('Boot Executed...........');
        
        // Initialize Plugin Frame
        new Init();
    }
}