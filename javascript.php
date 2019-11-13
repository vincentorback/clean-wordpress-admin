<?php

/**
 * De-registers WordPress default javascript
 *
 * @link https://codex.wordpress.org/Function_Reference/wp_deregister_script
 */
add_action(
    'wp_enqueue_scripts', function () {
        wp_deregister_script('jquery');
    }
);

/**
 * Remove oEmbed-specific JavaScript from the front-end and back-end.
 */
remove_action('wp_head', 'wp_oembed_add_host_js');
