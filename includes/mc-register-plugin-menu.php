<?php
function mc_register_plugin_menu() {

    // Create our settings page as a submenu page.
    add_submenu_page(
        'upload.php',
        __( 'Media Cleanup', 'media-cleanup' ),
        __( 'Media Cleanup', 'media-cleanup' ),
        'manage_options',
        'media-cleanup',
        'display_settings_page'
    );
}

function display_settings_page() {

    require_once MC_PLUGIN_PATH . 'template-parts/admin-display.php';

}