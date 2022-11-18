<?php

/**
 * Plugin Name:       Media Cleanup
 * Plugin URI:        https://github.com/dthenley/Media-Cleanup
 * Description:       A plugin to help declutter the upload folder.
 * Version:           2.0.0
 * Author:            Donte Henley
 * Author URI:        https://dontehenley.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       media-cleanup
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'MEDIA_CLEANUP_VERSION', '2.0.0' );

/**
 * Plugin objectives
 * 1. Grab and display a list of files in the wordpress upload folder
 * 2. Grab and display a list of the files in the wordpress media library
 * 3. List out which files from the upload folder that is not included in the media library
 * 4. Delete all files that are in that list
 * 5. Run regenerate thumbnail to then go and regenerate any source set images that was deleted in the process.
 */
// Plugin Constants
define( 'MC_PLUGIN_PATH', plugin_dir_path( __FILE__ ));

 // Includes for functions
 foreach ( glob( MC_PLUGIN_PATH . "includes/*.php" ) as $file ) {
    include_once $file;
}

 // Hooks
 add_action( 'admin_menu', 'mc_register_plugin_menu');