<?php

/**
 * Disable Gutenberg for all post types
 */

add_filter('gutenberg_can_edit_post_type', '__return_false');


/**
 * Disable Gutenberg for a specific posts, post types, templates, etc.
 */
add_filter('use_block_editor_for_post', function ($use_block_editor, $post) {
  // Disable for specific post ID
  if ($post->ID === 123) {
    return false;
  }

  // Disable for post type
  if ($post->post_type == 'event') {
    return false;
  }

  // Disable for page template
  if (basename(get_page_template($post->ID)) == 'template-events.php') {
    return false;
  }

  // Return default value
  return $use_block_editor;
}, 10, 2);
