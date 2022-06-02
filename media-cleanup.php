<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://dontehenley.com/
 * @since             1.0.0
 * @package           Media_Cleanup
 *
 * @wordpress-plugin
 * Plugin Name:       Media Cleanup
 * Plugin URI:        https://github.com/dthenley/Media-Cleanup
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
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
define( 'MEDIA_CLEANUP_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-media-cleanup-activator.php
 */
function activate_media_cleanup() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-media-cleanup-activator.php';
	Media_Cleanup_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-media-cleanup-deactivator.php
 */
function deactivate_media_cleanup() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-media-cleanup-deactivator.php';
	Media_Cleanup_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_media_cleanup' );
register_deactivation_hook( __FILE__, 'deactivate_media_cleanup' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-media-cleanup.php';



/**
 * @internal never define functions inside callbacks.
 * these functions could be run multiple times; this would result in a fatal error.
 */
 
/**
 * custom option and settings
 */
/*
function wporg_settings_init() {
    // Register a new setting for "wporg" page.
    register_setting( 'wporg', 'wporg_options' );
 
    // Register a new section in the "wporg" page.
    add_settings_section(
        'wporg_section_developers',
        __( 'The Matrix has you.', 'wporg' ), 'wporg_section_developers_callback',
        'wporg'
    );
 
    // Register a new field in the "wporg_section_developers" section, inside the "wporg" page.
    add_settings_field(
        'wporg_field_pill', // As of WP 4.6 this value is used only internally.
                                // Use $args' label_for to populate the id inside the callback.
            __( 'Pill', 'wporg' ),
        'wporg_field_pill_cb',
        'wporg',
        'wporg_section_developers',
        array(
            'label_for'         => 'wporg_field_pill',
            'class'             => 'wporg_row',
            'wporg_custom_data' => 'custom',
        )
    );
}
*/
 
/**
 * Register our wporg_settings_init to the admin_init action hook.
 */
//add_action( 'admin_init', 'wporg_settings_init' );
 
 
/**
 * Custom option and settings:
 *  - callback functions
 */
 
 
/**
 * Developers section callback function.
 *
 * @param array $args  The settings array, defining title, id, callback.
 */
/*
function wporg_section_developers_callback( $args ) {
    ?>
    <p id="<?php echo esc_attr( $args['id'] ); ?>"><?php esc_html_e( 'Follow the white rabbit.', 'wporg' ); ?></p>
    <?php
}
 
*/
/**
 * Pill field callbakc function.
 *
 * WordPress has magic interaction with the following keys: label_for, class.
 * - the "label_for" key value is used for the "for" attribute of the <label>.
 * - the "class" key value is used for the "class" attribute of the <tr> containing the field.
 * Note: you can add custom key value pairs to be used inside your callbacks.
 *
 * @param array $args
 */
/*
function wporg_field_pill_cb( $args ) {
    // Get the value of the setting we've registered with register_setting()
    $options = get_option( 'wporg_options' );
    ?>
    <select
            id="<?php echo esc_attr( $args['label_for'] ); ?>"
            data-custom="<?php echo esc_attr( $args['wporg_custom_data'] ); ?>"
            name="wporg_options[<?php echo esc_attr( $args['label_for'] ); ?>]">
        <option value="red" <?php echo isset( $options[ $args['label_for'] ] ) ? ( selected( $options[ $args['label_for'] ], 'red', false ) ) : ( '' ); ?>>
            <?php esc_html_e( 'red pill', 'wporg' ); ?>
        </option>
        <option value="blue" <?php echo isset( $options[ $args['label_for'] ] ) ? ( selected( $options[ $args['label_for'] ], 'blue', false ) ) : ( '' ); ?>>
            <?php esc_html_e( 'blue pill', 'wporg' ); ?>
        </option>
    </select>
    <p class="description">
        <?php esc_html_e( 'You take the blue pill and the story ends. You wake in your bed and you believe whatever you want to believe.', 'wporg' ); ?>
    </p>
    <p class="description">
        <?php esc_html_e( 'You take the red pill and you stay in Wonderland and I show you how deep the rabbit-hole goes.', 'wporg' ); ?>
    </p>
    <?php
}
*/
 
/**
 * Add the top level menu page.
 */
/*
function wporg_options_page() {
    add_menu_page(
        'WPOrg',
        'WPOrg Options',
        'manage_options',
        'wporg',
        'wporg_options_page_html'
    );
}
 */
 
/**
 * Register our wporg_options_page to the admin_menu action hook.
 */
//add_action( 'admin_menu', 'wporg_options_page' );
 
 
/**
 * Top level menu callback function
 */
/*
function wporg_options_page_html() {
    // check user capabilities
    if ( ! current_user_can( 'manage_options' ) ) {
        return;
    }
 
    // add error/update messages
 
    // check if the user have submitted the settings
    // WordPress will add the "settings-updated" $_GET parameter to the url
    if ( isset( $_GET['settings-updated'] ) ) {
        // add settings saved message with the class of "updated"
        add_settings_error( 'wporg_messages', 'wporg_message', __( 'Settings Saved', 'wporg' ), 'updated' );
    }
 
    // show error/update messages
    settings_errors( 'wporg_messages' );
    ?>
    <div class="wrap">
        <h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
        <pre>

			<?php 
			// Cycles through Upload folder to get a list of files inside each directory.
			$upload_folder = wp_get_upload_dir()['basedir'];
			function dirToArray($dir) {
  
				$result = array();
                $final_result = array();
                $c = 0;
			 
				$cdir = scandir($dir);
				foreach ($cdir as $key => $value)
				{
					if (!in_array($value,array(".","..")))
					{
					  if (is_dir($dir . DIRECTORY_SEPARATOR . $value))
					  {
						 $result[$value] = dirToArray($dir . '/' . $value);
                         
					  }
					  else
					  {
						 $result[] = $dir . '/' . $value . 'donte';
                         print_r($dir . '/' . $value . ' - '.$c.'<br>');
						 $final_result[$c] = $dir . '/' . $value;
                         $c++;

					  }
				   }
				}
			   
				return $final_result;
			 }
			 print_r( dirToArray($upload_folder));
             $full_upload_folder = dirToArray($upload_folder);
			?>

		</pre>

		<pre>
			<?php
			
			$query_images_args = array(
				'post_type'      => 'attachment',
				// 'post_mime_type' => 'image',
				'post_status'    => 'inherit',
				'posts_per_page' => - 1,
			);

			$query_images = new WP_Query( $query_images_args );

			$images = array();
			foreach ( $query_images->posts as $image ) {
				// print_r($image);
				$images[] = get_attached_file( $image->ID );
			}
			// print_r($images);
			?>
		</pre>
		
		<form action="options.php" method="post">
            <?php
            // output security fields for the registered setting "wporg"
            settings_fields( 'wporg' );
            // output setting sections and their fields
            // (sections are registered for "wporg", each field is registered to a specific section)
            do_settings_sections( 'wporg' );
            // output save settings button
            submit_button( 'Save Settings' );
            ?>
        </form>
    </div>
    <?php
}
*/

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_media_cleanup() {

	$plugin = new Media_Cleanup();
	$plugin->run();

}
run_media_cleanup();
