<?php

/**
 * Disable Gutenberg for all post types
 */

add_filter('gutenberg_can_edit_post_type', '__return_false');


/**
 * Disable Gutenberg for a specific post type
 */
add_filter('gutenberg_can_edit_post_type', function ($is_enabled, $post_type) {
  if ($post_type === 'post') return false;
  
  return $is_enabled;
});

