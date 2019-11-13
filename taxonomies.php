<?php

/**
 * Remove default taxonomies
 *
 * @link https://developer.wordpress.org/reference/functions/taxonomy_exists/
 */

add_action(
    'init', function () {
        global $wp_taxonomies;

        // Categories
        unset($wp_taxonomies['category']);

        // Tags
        unset($wp_taxonomies['post_tag']);
    }
);
