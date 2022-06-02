<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://dontehenley.com/
 * @since      1.0.0
 *
 * @package    Media_Cleanup
 * @subpackage Media_Cleanup/admin/partials
 */
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<?php


function scanDirAndSubdir($dir, &$out = []) {
    $sun = scandir($dir);
    
    foreach ($sun as $a => $filename) {
        $way = realpath($dir . DIRECTORY_SEPARATOR . $filename);
        if (!is_dir($way)) {
            $out[] = $way;
        } else if ($filename != "." && $filename != "..") {
            scanDirAndSubdir($way, $out);
            $out[] = $way;
        }
    }

    $out = str_replace('\\', '/', $out);

    $out = str_replace( get_home_path(), get_site_url( null, '/', null ), $out );
    
    return $out;
}

// Gets the actual Directory
$upload_folder = wp_get_upload_dir()['basedir'] . '/';




echo '<pre>';
// var_dump(scanDirAndSubdir($upload_folder));
echo '</pre>';

// Get Media Library Urls
$query_images_args = array(
    'post_type'      => 'attachment',
    'post_mime_type' => 'image',
    'post_status'    => 'inherit',
    'posts_per_page' => - 1,
);

$query_images = new WP_Query( $query_images_args );

$images = array();
foreach ( $query_images->posts as $image ) {
    $images[] = wp_get_attachment_url( $image->ID );
}

echo '<pre>';
var_dump($images);
echo '</pre>';