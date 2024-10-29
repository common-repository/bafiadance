<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       http://bafiadance.club
 * @since      1.0.0
 *
 * @package    Bafiadance
 * @subpackage Bafiadance/admin/partials
 */
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<div class="wrap">

    <h2><?php echo esc_html(get_admin_page_title()); ?></h2>

    <form method="post" name="bafiadance_options" action="options.php">
        <?php
            //Grab all options
            $options = get_option($this->sys_name);

            // ScriptId
            $scriptId = $options['script_id'];
        ?>

        <?php
            settings_fields($this->sys_name);
            do_settings_sections($this->sys_name);
        ?>

        <!-- remove injected CSS from comments widgets -->
        <fieldset>
            <legend class="screen-reader-text"><span>Script Id / User Id</span></legend>
            <label for="<?php echo $this->sys_name; ?>-script-id">
                <span><?php esc_attr_e('Script ID / User ID', $this->sys_name); ?></span>
                <input type="text" id="<?php echo $this->sys_name; ?>-script-id" name="<?php echo $this->sys_name; ?>[script_id]"
                       placeholder="Fill your project script id or user id here" style="width: 300px;" value="<?php echo htmlspecialchars($scriptId); ?>" required/>
            </label>
        </fieldset>

        <?php submit_button('Save all changes', 'primary','submit', TRUE); ?>
    </form>

</div>
