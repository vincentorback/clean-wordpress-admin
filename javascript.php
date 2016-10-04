<?php

/**
 * De-registers the WordPress stock jQuery script
 * @link https://codex.wordpress.org/Function_Reference/wp_deregister_script
 */
add_action( 'wp_enqueue_scripts', function () {
  if ( !is_admin() ) {
     wp_deregister_script( 'jquery' );
  }
});
