<?php

function fetch_upload_folder_files() {
    // Gets the actual Directory
    $upload_folder = wp_get_upload_dir()['basedir'] . '/';
    $directory_array = scanDirAndSubdir($upload_folder);
    return $directory_array;
    
}

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

    // $out = str_replace( get_home_path(), get_site_url( null, '/', null ), $out );
    
    return $out;
}