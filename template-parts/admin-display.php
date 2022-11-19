<?php
if( !empty($_POST['diff'])) {
    foreach ($_POST['diff'] as $key ) {
        unlink( get_home_path() .  $key );
    }
}
?>

<div class="wrap">
    <h1><?php echo __('Media Cleanup', 'media-cleanup'); ?></h1>
    <div class="mc-upload-boxes">
        <div class="mc-upload-box">
            <?php 
            $directory_array = fetch_upload_folder_files();
            $upload_files = [];
            foreach($directory_array as $key) {
                if( ! is_dir($key) ) array_push($upload_files, $key);
            }

            $upload_files = str_replace( get_home_path(), get_site_url( null, '/', null ), $upload_files );
            foreach ($upload_files as $key) {
                print_r ("<div>$key</div>");
            }
            ?>
        </div>
        <div class="mc-upload-box">
            <?php
            $media_library_files = fetch_media_library_files();
            
            foreach ($media_library_files as $key) {
                print_r ("<div>$key</div>");
            }
            ?>
        </div>
    </div><!-- .mc-upload-boxes -->
    <div>
        <form action="" method="post">
            <?php
            $count = 0;
            $diff_files = array_diff($upload_files,$media_library_files);
            foreach ( $diff_files as $key ) {
                $path = str_replace(get_site_url( null, '/', null ), '', $key);
                echo "<p><input type='checkbox' name='diff[]' id='diff{$count}' value='{$path}' checked><label for='diff{$count}'>{$key}</label></p>";
                $count++;
            }
            ?>
            <button type="submit">Cleanup</button>
        </form>
    </div>
</div>