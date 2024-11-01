<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://github.com/Cardos0/
 * @since      1.0.0
 *
 * @package    Vvbc_In_Store_Product_Categories
 * @subpackage Vvbc_In_Store_Product_Categories/admin/partials
 */

// Get title of Page
$titulo = '<h2>' . esc_html(get_admin_page_title()) .'</h2><br />';
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->

<div class="wrap">
    <!-- Modal -->
    <div class="modal fade" id="reset-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle"><?php esc_attr_e('Reset settings', $this->plugin_name); ?></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <?php esc_attr_e('Are you sure about that? you will lose all saved settings!', $this->plugin_name); ?>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">
                <?php esc_attr_e('CANCEL', $this->plugin_name); ?>
            </button>
            <form method="post" class="reset-settings">
                 <?php wp_nonce_field('reset-settings_button_clicked'); ?>
                 <input type="hidden" value="true" name="reset-settings" />
                 <?php submit_button(__('Reset settings', $this->plugin_name), 'vvbc-submit delete primary', '', FALSE)?>
             </form>
          </div>
        </div>
      </div>
    </div>

    <!-- Page front  -->
    <?php echo $titulo; ?>

    <?php settings_errors(); ?>

    <!-- Form Settings -->
    <h3><?php esc_attr_e('Settings', $this->plugin_name); ?></h3>
    <form method="post" action="options.php">
        <?php
        settings_fields( $this->plugin_name );
        // Get Options
        $options = get_option($this->plugin_name);
        $display_categories = $options['display-categories'];
        $display_child_categories = $options['display-child-categories'];
         ?>
         <!-- Form Fields -->
        <fieldset>
            <label for="<?php echo $this->plugin_name; ?>-display-categories">
                <input type="checkbox" id="<?php echo $this->plugin_name; ?>-display-categories" name="<?php echo $this->plugin_name; ?>[display-categories]" value="1" <?php checked($display_categories, 1); ?>>
                <span><?php esc_attr_e('Display Products Categories in Shop Page.', $this->plugin_name); ?></span>
            </label>
        </fieldset>
        <h3><?php esc_attr_e('Child Categories', $this->plugin_name); ?></h3>
        <fieldset>
            <label for="<?php echo $this->plugin_name; ?>-not-display-child-categories">
                <input type="radio" id="<?php echo $this->plugin_name; ?>-not-display-child-categories" name="<?php echo $this->plugin_name; ?>[display-child-categories]" value="0" <?php echo 'checked' ;  ?>>
                <span><?php esc_attr_e("Hide Child categories.", $this->plugin_name); ?></span>
            </label>
        </fieldset>
        <fieldset>
            <label for="<?php echo $this->plugin_name; ?>-display-child-categories">
                <input type="radio" id="<?php echo $this->plugin_name; ?>-display-child-categories" name="<?php echo $this->plugin_name; ?>[display-child-categories]" value="1" <?php checked($display_child_categories, 1); ?>>
                <span><?php esc_attr_e('Display Child categories.', $this->plugin_name); ?></span>
            </label>
        </fieldset>
        <fieldset>
            <label for="<?php echo $this->plugin_name; ?>-display-only-last-child-categories">
                <input type="radio" id="<?php echo $this->plugin_name; ?>-display-only-last-child-categories" name="<?php echo $this->plugin_name; ?>[display-child-categories]" value="2" <?php checked($display_child_categories, 2); ?>>
                <span><?php esc_attr_e('Display Only last Child categories.', $this->plugin_name); ?></span>
            </label>
        </fieldset>
      <?php submit_button('', 'primary', 'vvbc-submit submit', true); ?>
    </form>
    <!--  Reset settings -->
    <div class="reset-settings">
        <?php submit_button(__('Reset settings', $this->plugin_name), 'vvbc-submit delete primary', '', true, array( 'data-toggle' => 'modal', 'data-target'=>'#reset-modal'))?>
    </div>

</div>
