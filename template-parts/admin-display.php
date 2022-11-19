<div class="wrap">
    <h1><?php echo __('Media Cleanup', 'media-cleanup'); ?></h1>
    <div class="mc-upload-box">
        <?php print_r(fetch_upload_folder_files()); ?>
    </div>
</div>