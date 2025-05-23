<?php
// admin/settings-page.php

if (!defined('ABSPATH')) exit;

function aifcms_add_settings_menu() {
    add_options_page(
        'AI Feed CMS Settings',
        'AI Feed CMS',
        'manage_options',
        'aifcms-settings',
        'aifcms_render_settings_page'
    );
}
add_action('admin_menu', 'aifcms_add_settings_menu');

function aifcms_render_settings_page() {
    ?>
    <div class="wrap">
        <h1>AI Feed CMS Plugin Settings</h1>
        <p>This settings page will let you control what gets included in your llms.txt feed.</p>
        <p>(Coming soon: post types, category filters, preview)</p>
    </div>
    <?php
}