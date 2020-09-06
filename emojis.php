<?php

/**
 * Remove emoji support
 *
 * @link https://wordpress.org/support/article/using-smilies/
 */

add_action(
	'init',
	function () {
		// Front-end
		remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
		remove_action( 'wp_print_styles', 'print_emoji_styles' );

		// Admin
		remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
		remove_action( 'admin_print_styles', 'print_emoji_styles' );

		// Feeds
		remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
		remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );

		// Embeds
		remove_filter( 'embed_head', 'print_emoji_detection_script' );

		// Emails
		remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );

		// Disable from TinyMCE editor. Disabled in block editor by default
		add_filter(
			'tiny_mce_plugins',
			function ( $plugins ) {
				if ( is_array( $plugins ) ) {
					$plugins = array_diff( $plugins, array( 'wpemoji' ) );
				}

				return $plugins;
			}
		);

		/**
		 * Finally, disable it from the database also, to prevent characters from converting
		 *  There used to be a setting under Writings to do this
		 *  Not ideal to get & update it here - but it works :/
		 */
		if ( (int) get_option( 'use_smilies' ) === 1 ) {
			update_option( 'use_smilies', 0 );
		}
	}
);
