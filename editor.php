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


/**
* Remove post type metaboxes
 *
* @link https://developer.wordpress.org/reference/functions/remove_meta_box/
*/
add_action(
	'admin_menu',
	function () {
		$post_type = 'post';
		$context   = 'normal';

		// Author metabox
		remove_meta_box( 'authordiv', $post_type, $context );

		// Categories metabox.
		remove_meta_box( 'categorydiv', $post_type, $context );

		// Comments status metabox (discussion)
		remove_meta_box( 'commentstatusdiv', $post_type, $context );

		// Comments metabox
		remove_meta_box( 'commentsdiv', $post_type, $context );

		// Formats metabox
		remove_meta_box( 'formatdiv', $post_type, $context );

		// Attributes metabox
		remove_meta_box( 'pageparentdiv', $post_type, $context );

		// Custom fields metabox
		remove_meta_box( 'postcustom', $post_type, $context );

		// Excerpt metabox
		remove_meta_box( 'postexcerpt', $post_type, $context );

		// Featured image metabox
		remove_meta_box( 'postimagediv', $post_type, $context );

		// Revisions metabox
		remove_meta_box( 'revisionsdiv', $post_type, $context );

		// Slug metabox
		remove_meta_box( 'slugdiv', $post_type, $context );

		// Date, status, and update/save metabox
		remove_meta_box( 'submitdiv', $post_type, $context );

		// Tags metabox
		remove_meta_box( 'tagsdiv-post_tag', $post_type, $context );

		// Custom taxonomies metabox
		remove_meta_box( 'tagsdiv-{$tax-name}', $post_type, $context );

		// Hierarchical custom taxonomies metabox
		remove_meta_box( '{$tax-name}div', $post_type, $context );

		// Trackbacks metabox
		remove_meta_box( 'trackbacksdiv', $post_type, $context );
	}
);

add_action(
	'after_setup_theme',
	function () {
		/**
		 * Disable color palette
		 *
		 * @link https://developer.wordpress.org/reference/functions/add_theme_support/
		 */
		add_theme_support( 'editor-color-palette' );
		add_theme_support( 'disable-custom-colors' );

		/**
		 * Disable font sizes
		 *
		 * @link https://developer.wordpress.org/reference/functions/add_theme_support/
		 */
		add_theme_support( 'editor-font-sizes', array() );
		add_theme_support( 'disable-custom-font-sizes' );
	}
);


/**
 * Enable certain blocks
 *
 * @link https://developer.wordpress.org/reference/hooks/allowed_block_types/
 */
add_filter(
	'allowed_block_types',
	function ( $allowed_blocks, $post ) {
		$allowed_blocks = array(
			// Common
			'core/paragraph',
			'core/image',
			'core/heading',
			'core/gallery',
			'core/list',
			'core/quote',
			'core/audio',
			'core/cover', // previously core/cover-image
			'core/file',
			'core/video',

			// Formatting
			'core/table',
			'core/verse',
			'core/code',
			'core/freeform',
			'core/html',
			'core/preformatted',
			'core/pullquote',

			// Layout Elements
			'core/button',
			'core/columns',
			'core/media-text',
			'core/more',
			'core/nextpage',
			'core/separator',
			'core/spacer',

			// Widgets
			'core/shortcode',
			'core/archives',
			'core/categories',
			'core/latest-comments',
			'core/latest-posts',
			'core/calendar',
			'core/rss',
			'core/search',
			'core/tag-cloud',

			// Embeds
			'core/embed',
			'core-embed/twitter',
			'core-embed/youtube',
			'core-embed/facebook',
			'core-embed/instagram',
			'core-embed/wordpress',
			'core-embed/soundcloud',
			'core-embed/spotify',
			'core-embed/flickr',
			'core-embed/vimeo',
			'core-embed/animoto',
			'core-embed/cloudup',
			'core-embed/collegehumor',
			'core-embed/dailymotion',
			'core-embed/funnyordie',
			'core-embed/hulu',
			'core-embed/imgur',
			'core-embed/issuu',
			'core-embed/kickstarter',
			'core-embed/meetup-com',
			'core-embed/mixcloud',
			'core-embed/photobucket',
			'core-embed/polldaddy',
			'core-embed/reddit',
			'core-embed/reverbnation',
			'core-embed/screencast',
			'core-embed/scribd',
			'core-embed/slideshare',
			'core-embed/smugmug',
			'core-embed/speaker',
			'core-embed/ted',
			'core-embed/tumblr',
			'core-embed/videopress',
			'core-embed/wordpress-tv',
		);

		// Can also be specified by posts
		if ( $post->post_type === 'post' ) {
			$allowed_blocks = array(
				'core/paragraph',
				'core/heading',
			);
		}

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
		if ( 'post-tag' == $taxonomy->name ) {
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
