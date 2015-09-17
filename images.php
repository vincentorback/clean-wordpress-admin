<?php


/**
 * Remove default links on images
 */
add_action('admin_init', function () {
  $image_set = get_option('image_default_link_type');

  if ($image_set !== 'none') {
    update_option('image_default_link_type', 'none');
  }
}, 10);
