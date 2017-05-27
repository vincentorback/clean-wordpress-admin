<?php

/**
 * Remove left admin footer text
 * @link https://developer.wordpress.org/reference/hooks/admin_footer_text/
 */
add_filter( 'admin_footer_text', function () {
  return '';
}, 999);


/**
 * Remove right admin footer text (where the WordPress version nr is)
 * @link https://developer.wordpress.org/reference/hooks/update_footer/
 */
add_filter( 'update_footer', function () {
 return '';
}, 999);
