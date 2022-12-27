<?php

/**
 * De-registers WordPress default javascript
 *
 * @link https://developer.wordpress.org/reference/functions/wp_deregister_script/
 */
add_action(
	'wp_enqueue_scripts',
	function () {
		wp_deregister_script( 'jquery' );
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
