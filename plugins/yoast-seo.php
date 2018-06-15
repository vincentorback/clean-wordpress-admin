<?php

/**
 * Move Yoast Meta Box to bottom
 */
add_filter( 'wpseo_metabox_prio', function() {
  return 'low';
}, 10);

/**
 * Removes Yoast SEO comment in head
 */
if ( isset( $GLOBALS['wpseo_front'] ) && is_a( $GLOBALS['wpseo_front'], 'WPSEO_Frontend' ) ) {
  remove_action( 'wpseo_head', array( $GLOBALS['wpseo_front'], 'debug_marker' ), 2 );
}

/**
 * Remove Yoast from admin bar
 */
add_action( 'wp_before_admin_bar_render', function () {
  global $wp_admin_bar;

  $wp_admin_bar->remove_menu( 'wpseo-menu' );
}, 999);

/**
 * Remove 'primary' categories
 */
add_filter( 'wpseo_primary_term_taxonomies', '__return_false' );
