<?php
/*
Plugin Name: AI Feed CMS Plugin
Description: Generates and serves an llms.txt feed for AI crawlers based on your WordPress content.
Version: 0.1.0
Author: Gregory Gue
*/

if (!defined('ABSPATH')) exit;

if (!defined('AIFCMS_PATH')) {
    define('AIFCMS_PATH', plugin_dir_path(__FILE__));
}

require_once AIFCMS_PATH . 'includes/llms-feed-generator.php';

function aifcms_add_rewrite_rule() {
    add_rewrite_rule('^llms.txt$', 'index.php?llms_feed=1', 'top');
}
add_action('init', 'aifcms_add_rewrite_rule');

function aifcms_query_vars($vars) {
    $vars[] = 'llms_feed';
    return $vars;
}
add_filter('query_vars', 'aifcms_query_vars');

function aifcms_template_redirect() {
    if (get_query_var('llms_feed') == 1) {
        header('Content-Type: text/plain');
        echo aifcms_generate_llms_feed();
        exit;
    }
}
add_action('template_redirect', 'aifcms_template_redirect');
