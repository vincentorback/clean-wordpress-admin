<?php

function hide_updates () {
  global $wp_version;

  return (object) array(
    'last_checked' => time(),
    'version_checked' => $wp_version
  );
}

/* Disable core update notifications */
add_filter('pre_site_transient_update_core', 'hide_updates');

/* Disable plugin update notifications */
add_filter('pre_site_transient_update_plugins', 'hide_updates');

/* Disable theme update notifications */
add_filter('pre_site_transient_update_themes', 'hide_updates');



/**
 * Disable only inactive plugins update notifications
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
