<?php

/**
 * De-registers WordPress default javascript
 * @link https://codex.wordpress.org/Function_Reference/wp_deregister_script
 */
add_action( 'wp_enqueue_scripts', function () {
   wp_deregister_script( 'jquery' );
   wp_deregister_script( 'wp-embed' );
});
