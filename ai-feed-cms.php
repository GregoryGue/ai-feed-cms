<?php
/**
 * Plugin Name: AI Feed CMS
 * Plugin URI: https://yourwebsite.com
 * Description: Generates llms.txt feeds for AI training from WordPress content
 * Version: 1.0.0
 * Author: Gregory Gue
 * License: GPL v2 or later
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

// Define plugin constants
define('AIFCMS_PLUGIN_DIR', plugin_dir_path(__FILE__));
define('AIFCMS_PLUGIN_URL', plugin_dir_url(__FILE__));

// Include required files
require_once AIFCMS_PLUGIN_DIR . 'admin/settings-page.php';
require_once AIFCMS_PLUGIN_DIR . 'includes/llms-feed-generator.php';

// Activation hook (optional)
register_activation_hook(__FILE__, 'aifcms_activate_plugin');
function aifcms_activate_plugin() {
    // Add any activation tasks here
    flush_rewrite_rules();
}