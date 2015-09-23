<?php

/**
 * Remove feeds and wordpress-specific content that is generated on the wp_head hook.
 */
add_action( 'init', function () {
  // Remove the Really Simple Discovery service link
  remove_action( 'wp_head', 'rsd_link' );

  // Remove the link to the Windows Live Writer manifest
  remove_action( 'wp_head', 'wlwmanifest_link' );

  // Remove the general feeds
  remove_action( 'wp_head', 'feed_links', 2 );

  // Remove the extra feeds, such as category feeds
  remove_action( 'wp_head','feed_links_extra', 3 );

  // Remove the displayed XHTML generator
  remove_action( 'wp_head', 'wp_generator' );
});
