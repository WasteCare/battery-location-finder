<h2>WasteCare Map Location Settings</h2>
  <form action="options.php" method="post">
    <?php 
    settings_fields( 'wc_location_plugin_settings' );
    do_settings_sections( 'wc_location_finder' );
    ?>
    <input
      type="submit"
      name="submit"
      class="button button-primary"
      value="<?php esc_attr_e( 'Save' ); ?>"
    />
  </form>