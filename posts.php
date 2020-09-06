<?php

/**
 * Remove post type functions
 *
 * @link https://developer.wordpress.org/reference/functions/remove_post_type_support/
 */
add_action(
	'init',
	function () {
		$post_type = 'page'; // You can change this to 'post' or any custom post type.

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
	}
);
