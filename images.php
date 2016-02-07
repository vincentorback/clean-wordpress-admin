<?php

/**
 * Remove default links on images
 */
add_action( 'admin_init', function () {
  if ( get_option( 'image_default_link_type' ) !== 'none' ) {
    update_option( 'image_default_link_type', 'none' );
  }
});
