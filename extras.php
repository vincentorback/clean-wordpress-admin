<?php


/**
 * Check if on posts-page
 */
function is_page_for_posts() {
  return (is_home() || (is_archive() && ! is_post_type_archive()));
}


/**
 * Custom admin footer
 */
function custom_admin_footer() {
  echo '<span id="footer-thankyou">Website by <a href="//vincentorback.se" target="_blank">Vincent Orback</a></span>';
}

add_filter('admin_footer_text', 'custom_admin_footer');
