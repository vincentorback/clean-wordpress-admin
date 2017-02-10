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

   /* Auhtor metabox */
   remove_meta_box( 'authordiv', $post_type );

   /* Categories metabox. */
   remove_meta_box( 'categorydiv', $post_type );

   /* Comments status metabox (discussion) */
   remove_meta_box( 'commentstatusdiv', $post_type );

   /* Comments metabox */
   remove_meta_box( 'commentsdiv', $post_type );

   /* Formats metabox */
   remove_meta_box( 'formatdiv', $post_type );

   /* Attributes metabox */
   remove_meta_box( 'pageparentdiv', $post_type );

   /* Custom fields metabox */
   remove_meta_box( 'postcustom', $post_type );

   /* Excerpt metabox */
   remove_meta_box( 'postexcerpt', $post_type );

   /* Featured image metabox */
   remove_meta_box( 'postimagediv', $post_type );

   /* Revisions metabox */
   remove_meta_box( 'revisionsdiv', $post_type );

   /* Slug metabox */
   remove_meta_box( 'slugdiv', $post_type );

   /* Date, status, and update/save metabox */
   remove_meta_box( 'submitdiv', $post_type );

   /* Tags metabox */
   remove_meta_box( 'tagsdiv-post_tag', $post_type );

   /* Custom taxonomies metabox */
   remove_meta_box( 'tagsdiv-{$tax-name}', $post_type );

   /* Hierarchical custom taxonomies metabox */
   remove_meta_box( '{$tax-name}div', $post_type );

   /* Trackbacks metabox */
   remove_meta_box( 'trackbacksdiv', $post_type );
 });
