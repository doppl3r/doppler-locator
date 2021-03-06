<?php
    // Get plugin object
    global $doppler_locations_plugin;

    // Save data if form was submitted to this post
    if (isset($_POST['action'])) {
        $doppler_locations_plugin->get_plugin_admin()->get_doppler_save()->save_settings();
    }

    // Initialize variables
    $doppler_location_slug = get_option('doppler_location_slug');
    $doppler_location_public = get_option('doppler_location_public');
?>
<div class="doppler-body loading">
    <div class="nav row">
        <div class="col-6">
            <h1>Settings</h1>
        </div>
        <div class="col-6">
            <a class="btn blue" href="#save-settings">Save</a>
        </div>
    </div>
    <form action="" method="post">
        <input type="hidden" name="action" value="save">
        <div class="container">
            <label>Settings</label>
            <div class="row">
                <label class="small col-6-m">Option Name</label>
                <label class="small col-6-m">Option Value</label>
            </div>
            <div class="posts options">
                <div class="row option">
                    <div class="col-6-m name">doppler_location_slug</div>
                    <div class="col-6-m value">
                        <input type="text" name="doppler_location_slug" placeholder="ex: locations" value="<?php echo $doppler_location_slug; ?>">
                    </div>
                </div>
            </div>
            <div class="posts options">
                <div class="row option">
                    <div class="col-6-m name">doppler_location_public</div>
                    <div class="col-6-m value">
                        <select name="doppler_location_public">
                        <?php
                            $public_options = array('true', 'false');
                            foreach($public_options as $s) {
                                $selected = '';
                                if ($doppler_location_public == $s) $selected = ' selected';
                                echo '<option value="' . $s . '"' . $selected . '>' . $s . '</option>';
                            }
                        ?>
                    </select>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>