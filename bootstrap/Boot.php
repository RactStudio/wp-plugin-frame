<?php

namespace PluginFrame;

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) { exit; }

use PluginFrame\Init;

/**
 * Load all php files (composer) ASAP the requst cycle is started. So, if needed can be call / execute asap as well.
 * Any / All WP Plugin Frame php classes / functions must execute after init action is completed
 */
class Boot
{
    protected Init $init;

    public function __construct()
    {
        $this->init = new Init();
    }

    public function instance()
    {
        // Initialize before other plugins
        $this->init->initialize();
    }
}