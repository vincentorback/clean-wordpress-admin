<?php



/**
 * Disable editor for a specific posts, post types, templates, etc.
 *
 * @link https://developer.wordpress.org/reference/hooks/use_block_editor_for_post/
 */
add_filter(
	'use_block_editor_for_post',
	function ( $use_block_editor, $post ) {
		// Disable for all post types
		return false;

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
 * Disable editing blocks as code in the block editor
 *
 * @link https://developer.wordpress.org/reference/hooks/block_editor_settings_all/
 */
add_filter( 'block_editor_settings_all', function ( $settings ) {
	$settings['codeEditingEnabled'] = false;

	return $settings;
});



/**
 * Change editor settings
 *
 * @deprecated These should be set in theme.json from now on
 * @link https://developer.wordpress.org/block-editor/how-to-guides/themes/theme-json/#backward-compatibility-with-add_theme_support
 */
add_action(
	'after_setup_theme',
	function () {
		// Remove default colors
		add_theme_support( 'editor-color-palette', array() );

		// Disable custom colors
		add_theme_support( 'disable-custom-colors' );

		// Remove default font sizes
		add_theme_support( 'editor-font-sizes', array() );

		// Disable setting a custom font size
		add_theme_support( 'disable-custom-font-sizes' );

		// Remove default gradients
		remove_theme_support( 'editor-gradient-presets', array() );

		// Disable custom gradients
		add_theme_support( 'disable-custom-gradients' );
	}
);



/**
* Set allowed block types
*
* @link https://developer.wordpress.org/reference/hooks/allowed_block_types_all/
* @link https://developer.wordpress.org/block-editor/reference-guides/core-blocks/
*/
add_filter(
	'allowed_block_types_all',
	function ( $block_editor_context, $editor_context ) {
		if ( ! empty( $editor_context->post ) ) {
			return array(
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
				'core/list-item',
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
		}

		return $block_editor_context;
	},
	10,
	2
);



/**
 * Remove bult in block patterns
 */
add_action(
	'after_setup_theme',
	function () {
		remove_theme_support( 'core-block-patterns' );
	},
	11
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



/**
 * Remove default theme json settings.
 * Even if these are removed in you theme.json-file, they will still be used by the inline styles "global-styles" because they could be used by blocks, plugins etc.
 *
 * @link https://developer.wordpress.org/reference/hooks/wp_theme_json_data_default/
 */
add_filter(
	'wp_theme_json_data_default',
	function ( $theme_json ) {
		$new_data = array(
			'version'  => 2,
			'settings' => array(
				'color'      => array(
					'palette'   => array(),
					'gradients' => array(),
					'duotone'   => array(),
				),
				'shadow'     => array(),
				'typography' => array(
					'fontSizes'      => array(),
					'fontFamilies'   => array(),
					'fontWeights'    => array(),
					'lineHeights'    => array(),
					'letterSpacings' => array(),
				),
			),
		);

		return $theme_json->update_with( $new_data );
	}
);
