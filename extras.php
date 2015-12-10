<?php

/**
 * Check if on posts-page
 */
function is_page_for_posts () {
  return ( is_home() || (is_archive() && ! is_post_type_archive() ) );
}


/**
 * Nice debugging replacement to var_dump
 *
 * @param $data Object you want to test.
 */
function show ( $data ) {
  echo '<pre style="box-sizing: border-box; height: 50vh; resize: vertical;
        outline: 2px solid; background: #fff; font: 13px/1.3 monospace">';
  print_r( $data );
  echo '</pre>';
}


/**
 * Totaly disable comments
 */
add_action( 'init', function () {
  remove_post_type_support( 'post', 'comments' );
  remove_post_type_support( 'page', 'comments' );
});

add_action( 'admin_menu', function () {
  remove_menu_page( 'edit-comments.php' );
});

add_action( 'wp_before_admin_bar_render', function () {
  global $wp_admin_bar;
  $wp_admin_bar->remove_menu( 'comments' );
});


/**
 * Custom avatars.
 * @link https://codex.wordpress.org/How_to_Use_Gravatars_in_WordPress
 *
 * @param $user_contact Existing avatars
 */
add_filter( 'avatar_defaults', function ( $avatar_defaults ) {
  $my_avatar = get_bloginfo( 'template_directory' ) . '/images/my-avatar.gif';
  $avatar_defaults[$my_avatar] = "My Avatar";
  return $avatar_defaults;
}, 999);


/**
 * Custom left admin footer text
 * @link https://developer.wordpress.org/reference/hooks/admin_footer_text/
 */
add_filter( 'admin_footer_text', function () {
  return '<span id="footer-thankyou">Website by <a href="//vincentorback.se" target="_blank">Vincent Orback</a></span>';
}, 999);


/**
 * Custom right admin footer text (where the WordPress version nr is)
 */
 add_filter( 'update_footer', function () {
   return '¯\_(ツ)_/¯';
 }, 999);
