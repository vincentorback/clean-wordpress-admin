<?php

/**
 * Hide core updates
 */
add_action( 'after_setup_theme', function () {

  // Still show updates to superadmins
  if ( ! current_user_can( 'update_core' ) ) {
    return;
  }

  add_action( 'init', create_function( '$a', "remove_action( 'init', 'wp_version_check' );" ), 2 );
  add_filter( 'pre_option_update_core', '__return_null' );
  add_filter( 'pre_site_transient_update_core', '__return_null' );
}, 1 );


/**
 * Disable plugin update notifications
 */
remove_action( 'load-update-core.php', 'wp_update_plugins' );
add_filter( 'pre_site_transient_update_plugins', '__return_null' );
