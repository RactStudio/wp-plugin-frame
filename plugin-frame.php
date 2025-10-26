<?php
/**
 * Plugin Name
 * 
 * @package           PluginFrame
 * @author            RactStudio
 * @copyright         2025 RactStudio & Mahamudul Hasan Rubel
 * @license           MIT
 *
 * @wordpress-plugin
 * Plugin Name:         Plugin Frame
 * Plugin URI:          https://wpframestudio.com/wp-plugin-frame
 * Description:         A modern Laravel-like WordPress plugin framework that helps you build scalable, elegant plugins with clean structure and developer-friendly tools — powered by WP Frame Studio.
 * Version:             0.1.0
 * Requires at least:   5.2
 * Tested up to:        6.8
 * Requires PHP:        7.4
 * Author:              RactStudio
 * Author URI:          https://ractstudio.com
 * Text Domain:         plugin-frame
 * Domain Path:         /languages
 * License:             MIT
 * License URI:         https://mit-license.org/
 */

namespace PluginFrame;

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) { exit; }

/**
 * Define Constants.
 * Also declared in config/Bootstrap.php for redundancy.
 * This constants can be override in config/Constants.php
 */
define( 'PLUGIN_FRAME_NAME', 'Plugin Frame' ); // Required
define( 'PLUGIN_FRAME_VERSION', '0.9.2' ); // Required
define( 'PLUGIN_FRAME_MIN_WP', '5.2' ); // Required
define( 'PLUGIN_FRAME_MAX_WP', '6.7.2' ); // Required
define( 'PLUGIN_FRAME_MIN_PHP', '7.4' ); // Required
define( 'PLUGIN_FRAME_MAX_PHP', '8.4' ); // Required
define( 'PLUGIN_FRAME_SLUG', 'plugin-frame' ); // Required
define( 'PLUGIN_FRAME_FILE', __FILE__ ); // Required
define( 'PLUGIN_FRAME_DIR', plugin_dir_path( PLUGIN_FRAME_FILE ) ); // Required
define( 'PLUGIN_FRAME_URL', plugin_dir_url( PLUGIN_FRAME_FILE ) ); // Required
define( 'PLUGIN_FRAME_BASENAME', plugin_basename( PLUGIN_FRAME_FILE ) ); // Required

// Load autoloader
if (file_exists(__DIR__ . '/vendor/autoload.php')) {
    require_once __DIR__ . '/vendor/autoload.php';

    // Initialize plugin
    if (class_exists('\\PluginFrame\Boot')) {
        (new \PluginFrame\Boot)->instance();
    }
} else {
    // Fallback or error handling
    \add_action('admin_notices', function() {
        echo '<div class="error"><p>Plugin dependencies not loaded. Please run composer install.</p></div>';
    });
    return;
}