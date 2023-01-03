<?php

/**
 * De-registers WordPress default
 *
 * @link https://developer.wordpress.org/reference/functions/wp_dequeue_style/
 */
add_action(
  'wp_enqueue_scripts',
  function () {
    wp_dequeue_style('wp-block-library'); // Wordpress block libaray styles
    wp_dequeue_style('global-styles');// Wordpress global styles generated from theme.json
  }
);

/**
 * Remove oEmbed-specific JavaScript from the front-end and back-end.
 *
 * @link https://developer.wordpress.org/reference/functions/wp_oembed_add_host_js/
 */
remove_action( 'wp_head', 'wp_oembed_add_host_js' );

/**
 * Remove wordpress version from scripts
 */
function remove_script_version ($src)
{
  global $wp_version;

  $parts = explode( "?ver=$wp_version", $src );
  return $parts[0];
}

add_filter( 'script_loader_src', 'remove_script_version', 15, 1 );
add_filter( 'style_loader_src', 'remove_script_version', 15, 1 );
