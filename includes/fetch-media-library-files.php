<?php
function fetch_media_library_files() {

    global $wpdb;
    $image_guids = $wpdb->get_results("SELECT guid FROM {$wpdb->prefix}posts WHERE post_type = 'attachment'", OBJECT);
    
    $image_urls = [];
    foreach ($image_guids as $image_guid_object) {
        array_push($image_urls,$image_guid_object->guid);        
    }
    
    return( $image_urls );
    
}