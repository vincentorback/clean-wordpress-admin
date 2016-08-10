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


/**
 * Remove image size attributes
 * @param  String $html
 */
function remove_image_sizes( $html ) {
  return preg_replace( '/(width|height)="\d*"/', '', $html );
}

// Remove size attributes from thumbnail images
add_filter( 'post_thumbnail_html', 'remove_image_sizes' );

// Remove size attributes from images in posts
add_filter( 'image_send_to_editor', 'remove_image_sizes' );
