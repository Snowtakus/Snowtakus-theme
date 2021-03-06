<?php

/*
 * Register our settings (we only have one) with WordPress
 */
function snowtakus_theme_settings_register() {
  register_setting( 'snowtakus_theme_settings_group', 'snowtakus_theme_logo' );
  register_setting( 'snowtakus_theme_settings_group', 'snowtakus_contact_us_url' );
  register_setting( 'snowtakus_theme_settings_group', 'snowtakus_become_a_dealer_url' );
  register_setting( 'snowtakus_theme_settings_group', 'snowtakus_find_a_dealer_url' );
}
add_action( 'admin_init', 'snowtakus_theme_settings_register' );

/**
 *
 */
function snowtakus_theme_settings() {
	add_menu_page( 'Dura-Haul Canada Theme Settings', 'Dura-Haul Settings', 'manage_options', 'snowtakus-theme-settings', 'snowtakus_theme_settings_admin_page', 'dashicons-admin-settings', 59.999 );
}
add_action( 'admin_menu', 'snowtakus_theme_settings' );

/**
 *
 */
function snowtakus_theme_settings_admin_page() {
  ?>
    <div class="wrap">
      <h1>Dura-Haul Canada Theme Settings</h1>
      <hr />

      <form method="post" action="options.php">
        <?php settings_fields( 'snowtakus_theme_settings_group' ); ?>
        <?php do_settings_sections( 'snowtakus_theme_settings_group' ); ?>
        <table class="form-table">
          <tr valign="top">
            <th scope="row">Logo URL</th>
            <td><input type="text" name="snowtakus_theme_logo" size="32" value="<?php echo esc_attr( get_option('snowtakus_theme_logo') ); ?>" /></td>
          </tr>
          <tr valign="top">
            <th scope="row">Contact Us URL</th>
            <td><input type="text" name="snowtakus_contact_us_url" size="32" value="<?php echo esc_attr( get_option('snowtakus_contact_us_url') ); ?>" /></td>
          </tr>
          <tr valign="top">
            <th scope="row">Become a Dealer URL</th>
            <td><input type="text" name="snowtakus_become_a_dealer_url" size="32" value="<?php echo esc_attr( get_option('snowtakus_become_a_dealer_url') ); ?>" /></td>
          </tr>
          <tr valign="top">
            <th scope="row">Find a Dealer URL</th>
            <td><input type="text" name="snowtakus_find_a_dealer_url" size="32" value="<?php echo esc_attr( get_option('snowtakus_find_a_dealer_url') ); ?>" /></td>
          </tr>
        </table>
        <?php submit_button(); ?>
      </form>
    </div>
  <?php
}
