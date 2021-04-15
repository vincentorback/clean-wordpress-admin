<?php

/**
 * Disable editor for all post types
 *
 * @link https://developer.wordpress.org/reference/hooks/use_block_editor_for_post/
 */

add_filter( 'use_block_editor_for_post', '__return_false', 10, 2 );


/**
 * Disable editor for a specific posts, post types, templates, etc.
 *
 * @link https://developer.wordpress.org/reference/hooks/use_block_editor_for_post/
 */
add_filter(
	'use_block_editor_for_post',
	function ( $use_block_editor, $post ) {
		// Disable for specific post ID
		if ( $post->ID === 123 ) {
			return false;
		}

		// Disable for post type
		if ( $post->post_type == 'event' ) {
			return false;
		}

		// Disable for page template
		if ( basename( get_page_template( $post->ID ) ) == 'template-events.php' ) {
			return false;
		}

		// Return default value
		return $use_block_editor;
	},
	10,
	2
);

add_action(
	'after_setup_theme',
	function () {
		// Remove default colors
		add_theme_support( 'editor-color-palette' );

		// Disable custom colors
		add_theme_support( 'disable-custom-colors' );

		// Remove default font sizes
		add_theme_support( 'editor-font-sizes', array() );

		// Disable custom font sizes
		add_theme_support( 'disable-custom-font-sizes' );
	}
);


/**
* Set allowed block types
*
* @link https://developer.wordpress.org/reference/hooks/allowed_block_types/
*/
add_filter(
	'allowed_block_types',
	function ( $allowed_blocks, $post ) {

		$allowed_blocks = array(
			'core/button',
			'core/buttons',
			'core/freeform',
			'core/code',
			'core/column',
			'core/columns',
			'core/file',
			'core/gallery',
			'core/group',
			'core/heading',
			'core/html',
			'core/image',
			'core/list',
			'core/media-text',
			'core/missing',
			'core/more',
			'core/navigation-link',
			'core/nextpage',
			'core/paragraph',
			'core/preformatted',
			'core/pullquote',
			'core/quote',
			'core/separator',
			'core/social-links',
			'core/spacer',
			'core/subhead',
			'core/table',
			'core/text-columns',
			'core/verse',
			'core/video',
			'core/embed',

			'core/archives',
			'core/block',
			'core/calendar',
			'core/categories',
			'core/cover',
			'core/latest-comments',
			'core/latest-posts',
			'core/navigation',
			'core/navigation-link',
			'core/rss',
			'core/search',
			'core/shortcode',
			'core/social-link',
			'core/tag-cloud',
			'core/post-author',
			'core/post-comment',
			'core/post-comment-author',
			'core/post-comment-content',
			'core/post-comment-date',
			'core/post-comments',
			'core/post-comments-count',
			'core/post-comments-form',
			'core/post-content',
			'core/post-date',
			'core/post-excerpt',
			'core/post-featured-image',
			'core/post-hierarchical-terms',
			'core/post-tags',
			'core/post-title',
			'core/query',
			'core/query-loop',
			'core/query-pagination',
			'core/site-logo',
			'core/site-tagline',
			'core/site-title',
			'core/template-part',
		);

		return $allowed_blocks;
	},
	10,
	2
);

/**
 * Hide taxonomy metaboxes
 *
 * @link https://developer.wordpress.org/reference/hooks/rest_prepare_taxonomy/
 */
add_filter(
	'rest_prepare_taxonomy',
	function ( $response, $taxonomy ) {
		if ( 'post_tag' == $taxonomy->name ) {
			$response->data['visibility']['show_ui'] = false;
		}

		if ( 'category' == $taxonomy->name ) {
			$response->data['visibility']['show_ui'] = false;
		}

		return $response;
	},
	10,
	2
);
