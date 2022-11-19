<div class="wrap">
    <h1><?php echo __('Media Cleanup', 'media-cleanup'); ?></h1>
    <div class="mc-upload-box">
        <?php print_r(fetch_upload_folder_files()); ?>
    </div>
    <div class="mc-upload-box">
        <?php
        $media_library_files = fetch_media_library_files();
        
        foreach ($media_library_files as $key) {
            echo '<div>';
            print_r($key);
            echo '</div>';
        }
        ?>
        <!-- <pre>
            <?php print_r(fetch_media_library_files()); ?>
        </pre> -->
    </div>
</div>