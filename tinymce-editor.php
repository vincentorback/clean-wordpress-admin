<?php

/**
 * Set default editor mode to 'html', 'tinymce' or 'test'
 *
 * @link https://developer.wordpress.org/reference/hooks/wp_default_editor/
 */
add_filter( 'wp_default_editor', 'html' );


/**
 * Disable rich/visual editor
 *
 * @link https://developer.wordpress.org/reference/hooks/user_can_richedit/
 */
add_filter( 'user_can_richedit', '__return_false', 50 );


/**
 * Change default TinyMCE WYSIWYG settings.
 *
 * @link https://codex.wordpress.org/TinyMCE
 * @link https://www.tiny.cloud/docs-4x/general-configuration-guide/basic-setup/#toolbarmenuconfiguration
 * @link https://developer.wordpress.org/reference/hooks/tiny_mce_before_init/
 *
 * @param $settings Object Array of TinyMCE settings
 */
add_filter(
	'tiny_mce_before_init',
	function ( $settings ) {
		$settings['toolbar1']      = 'formatselect,bold,italic,bullist,numlist,link,underline';
		$settings['toolbar2']      = '';
		$settings['block_formats'] = 'Paragraph=p; Heading 1=h1; Heading 2=h2; Heading 3=h3;';

		return $settings;
	}
);
