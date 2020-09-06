<?php


/**
 * Set comment count to always be zero.
 *
 * @link https://developer.wordpress.org/reference/hooks/wp_count_comments/
 */
add_filter(
	'wp_count_comments',
	function ( $count ) {
		return (object) array(
			'approved'       => 0,
			'spam'           => 0,
			'trash'          => 0,
			'post-trashed'   => 0,
			'total_comments' => 0,
			'all'            => 0,
			'moderated'      => 0,
		);
	}
);


/**
 * Remove default fields in comment form
 *
 * @link https://developer.wordpress.org/reference/hooks/comment_form_default_fields/
 */
add_filter(
	'comment_form_default_fields',
	function ( $fields ) {
		unset( $fields['author'] );
		unset( $fields['email'] );
		unset( $fields['url'] );

		return $fields;
	}
);
