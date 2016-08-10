<?php

/**
 * Set default image attachment options
 */
add_action( 'after_setup_theme', function () {

  // Remove default link
  if ( get_option( 'image_default_link_type' ) !== 'none' ) {
    update_option( 'image_default_link_type', 'none' );
  }

  // Remove default alignment
  if ( get_option( 'image_default_align' ) !== 'none' ) {
    update_option('image_default_align', 'none' );
  }

  // Set default size
  if ( get_option( 'image_default_size' ) !== 'none' ) {
    update_option('image_default_size', 'large' );
  }

});


/**
 * Remove WordPress Gallery
 */
add_action('admin_enqueue_scripts', function () {
  wp_deregister_script('admin-gallery');
});


/**
 * Remove srcset on images
 */
add_filter( 'wp_calculate_image_srcset', '__return_false' );
