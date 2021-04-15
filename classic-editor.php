<?php

/**
 * Disable rich/visual editor
 *
 * @link https://developer.wordpress.org/reference/hooks/user_can_richedit/
 */
add_filter( 'user_can_richedit', '__return_false', 50 );


/**
 * Set default editor mode to 'html' or 'tinymce'
 *
 * @link https://developer.wordpress.org/reference/hooks/wp_default_editor/
 */
add_filter(
	'wp_default_editor',
	function () {
		return 'html';
	}
);


/**
 * Change default TinyMCE WYSIWYG settings.
 *
 * @link https://developer.wordpress.org/reference/hooks/tiny_mce_before_init/
 *
 * @param $settings Object Array of TinyMCE settings
 */
add_filter(
	'tiny_mce_before_init',
	function ( $settings ) {
		$settings['remove_linebreaks']            = true;
		$settings['keep_styles']                  = false;
		$settings['accessibility_focus']          = true;
		$settings['paste_remove_styles']          = true;
		$settings['paste_remove_spans']           = true;
		$settings['paste_strip_class_attributes'] = 'all';
		$settings['block_formats']                = 'Paragraph=p; Heading 1=h1; Heading 2=h2';
		$settings['toolbar1']                     = 'bold,italic,link,unlink';
		$settings['toolbar2']                     = 'formatselect,removeformat';
		$settings['toolbar3']                     = '';
		$settings['toolbar4']                     = '';

		return $settings;
	}
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
