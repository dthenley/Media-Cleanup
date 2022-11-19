<?php
function mc_enqueue_scripts() {
    $plugin_style_path = MC_PLUGIN_URL . 'assets/style.css';
    wp_enqueue_style( 'mc-admin-styles', $plugin_style_path );
}