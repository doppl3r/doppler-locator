<?php 
    /* Required variables: $post_status, $row (query results) */
    $status = get_post_meta($row->ID, "status")[0];
    $url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]";
    $url_edit = site_url() . '/wp-admin/admin.php?page=doppler-locations';
    $url_view = get_post_permalink($row->ID);
?>
<div class="row" data-post="<?php echo $row->ID; ?>">
    <div class="col-3-m status <?php echo str_replace(" ", "-", strtolower($status)); ?>"><label class="small"><?php echo ucfirst($status); ?></label></div>
    <div class="col-3-m title"><?php echo $row->post_title; ?></div>
    <div class="col-6-m options">
        <?php if ($post_status_filter == 'publish') : ?>
            <label class="small"><a href="<?php echo $url_edit; ?>&id=<?php echo $row->ID; ?>">Edit</a></label>
            <label class="small"><a href="<?php echo $url_view; ?>" target="_blank">View</a></label>
            <label class="small"><a href="#trash-post">Trash</a></label>
        <?php else : ?>
            <label class="small"><a href="#restore-post">Restore</a></label>
            <label class="small"><a href="#delete-post">Delete</a></label>
        <?php endif; ?>
    </div>
</div>