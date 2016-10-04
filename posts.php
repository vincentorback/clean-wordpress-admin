<?php

/**
 * Remove post type functions
 * @link https://codex.wordpress.org/Function_Reference/remove_post_type_support
 */
add_action( 'init', function () {
  $post_type = 'page';

  // Remove the title
  remove_post_type_support( $post_type, 'title' );

  // Remove the WYSIWYG-editor
  remove_post_type_support( $post_type, 'editor' );

  // Remove author
  remove_post_type_support( $post_type, 'author' );

  // Remove thumbnail
  remove_post_type_support( $post_type, 'thumbnail' );

  // Remove excerpt
  remove_post_type_support( $post_type, 'excerpt' );

  // Remove trackbacks
  remove_post_type_support( $post_type, 'trackbacks' );

  // Remove custom fields
  remove_post_type_support( $post_type, 'custom-fields' );

  // Remove comments
  remove_post_type_support( $post_type, 'comments' );

  // Remove revisions (will still store revisions)
  remove_post_type_support( $post_type, 'revisions' );

  // Remove page attributes like menu order
  remove_post_type_support( $post_type, 'page-attributes' );

  // Remove post format
  remove_post_type_support( $post_type, 'post-formats' );
});


/**
 * Remove post type metaboxes
 * @link https://codex.wordpress.org/Function_Reference/remove_meta_box
 */
add_action( 'admin_menu', function() {
  $post_type = 'post';

  remove_meta_box( 'postcustom', $post_type, 'normal' );
  remove_meta_box( 'commentstatusdiv', $post_type, 'normal' );
  remove_meta_box( 'commentsdiv', $post_type, 'normal' );
  remove_meta_box( 'authordiv', $post_type, 'normal' );
  remove_meta_box( 'tagsdiv-post_tag', $post_type, 'normal' );
});
