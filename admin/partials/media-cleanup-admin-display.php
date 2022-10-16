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

/**
 * Scan the upload folder
 */
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
$directory_array = scanDirAndSubdir($upload_folder);


// echo '<pre>';
// var_dump(scanDirAndSubdir($upload_folder));
// echo '</pre>';

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

$diff = array_diff($directory_array,$images);

// echo '<pre>';
// var_dump($images);
// echo '</pre>';

?>
<style>
    div.media-cleanup>div {
        width: 33%;
        float: left;
    }
</style>
<form action="" method="post">
    <label for="clean">Clean Image Folder</label>
    <input type="checkbox" name="clean" id="clean">
    <br>
    <button type="submit">Submit</button>
</form>

<div class="media-cleanup">
    <div>
        <?php
        foreach($directory_array as $key) {
            echo "<div>$key</div>";
        }
        ?>
    </div>
    <div>
        <?php
        foreach($images as $key) {
            echo "<div>$key</div>";
        }
        ?>
    </div>
    <!-- <div>
        <?php echo "<pre>";
        var_dump($diff);
        echo "</pre>"; ?>
    </div> -->
</div>

<?php
if(!empty($_POST)){

    foreach($diff as $image){
        $image_path = str_replace(get_home_url(),untrailingslashit(get_home_path()), $image);
        if( ! is_dir($image_path)){
            var_dump($image_path);
            // unlink($image_path);
        }
    }

}
