<?php
function fetch_media_library_files() {

    /*
    $json_url = get_rest_url() . 'wp/v2/media/';
    $json = file_get_contents($json_url);
    $data = json_decode($json, TRUE);

    $media_files[] = '';
    foreach ($data as $key ) {
        array_push($media_files, $key['guid']['rendered']);
        // $media_files .= $key['guid']['rendered'];
    }

    return $media_files;
    // return $data['content']['rendered'];
    */
    global $wpdb;
    $image_guids = $wpdb->get_results("SELECT guid FROM {$wpdb->prefix}posts WHERE post_type = 'attachment'", OBJECT);
    
    $image_urls = [];
    foreach ($image_guids as $image_guid_object) {
        array_push($image_urls,$image_guid_object->guid);        
    }
    
    return( $image_urls );
    
}