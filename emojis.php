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

		// Feeds
		remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
		remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );

		// Embeds
		remove_filter( 'embed_head', 'print_emoji_detection_script' );

		// Emails
		remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );

		// Since WP 6.4.0
		remove_action( 'enqueue_scripts', 'wp_enqueue_emoji_styles' );

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
	}
);

add_action(
	'admin_init',
	function () {
		// Admin
		remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
		remove_action( 'admin_print_styles', 'print_emoji_styles' );

		// Since WP 6.4.0
		remove_action( 'enqueue_scripts', 'wp_enqueue_emoji_styles' );
	}
);
