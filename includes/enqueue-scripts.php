<?php
function mc_enqueue_scripts() {
    $plugin_style_path = MC_PLUGIN_URL . 'assets/style.css';
    print_r($plugin_style_path);
    wp_enqueue_style( 'mc-admin-styles', $plugin_style_path );
}