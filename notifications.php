<?php

/**
 * Hide core updates
 */
add_action( 'after_setup_theme', function () {
  add_action( 'init', create_function( '$a', "remove_action( 'init', 'wp_version_check' );" ), 2 );
  add_filter( 'pre_option_update_core', '__return_null' );
  add_filter( 'pre_site_transient_update_core', '__return_null' );
}, 1 );


/**
 * Disable plugin update notifications
 */
remove_action( 'load-update-core.php', 'wp_update_plugins' );
add_filter( 'pre_site_transient_update_plugins', '__return_null' );


/**
 * Disable inactive plugins update notifications
 */
add_filter( 'transient_update_plugins', function ( $value = '' ) {
  if ( ( isset( $value->response ) ) && ( count( $value->response ) ) ) {
    $active_plugins = get_option( 'active_plugins' );
    if ( $active_plugins ) {
      foreach( $value->response as $plugin_idx => $plugin_item ) {
        if ( ! in_array( $plugin_idx, $active_plugins ) ) {
          unset( $value->response[$plugin_idx] );
        }
      }
    } else {
      foreach( $value->response as $plugin_idx => $plugin_item ) {
        unset( $value->response );
      }
    }
  }

  return $value;
});
