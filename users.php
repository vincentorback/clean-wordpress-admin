<?php

/**
 * Remove social contact methods
 */
add_filter(
	'user_contactmethods',
	function ( $contact_methods ) {
		unset( $contact_methods['facebook'] );
		unset( $contact_methods['instagram'] );
		unset( $contact_methods['linkedin'] );
		unset( $contact_methods['myspace'] );
		unset( $contact_methods['pinterest'] );
		unset( $contact_methods['soundcloud'] );
		unset( $contact_methods['tumblr'] );
		unset( $contact_methods['twitter'] );
		unset( $contact_methods['youtube'] );
		unset( $contact_methods['wikipedia'] );

		return $contact_methods; // or you could just return an empty array to remove them all
	}
);



/**
 * Hide profile fields
 *
 * @link https://developer.wordpress.org/reference/hooks/admin_print_scripts-hook_suffix/
 *
 * Visual Editor - .user-rich-editing-wrap
 * Syntax Highlighting - .user-syntax-highlighting-wrap
 * Admin Color Scheme - .user-admin-color-wrap
 * Keyboard Short - .user-comment-shortcuts-wrap
 * Show Toolbar - .show-admin-bar
 * Language - .user-language-wrap
 *
 * First name - .user-first-name-wrap
 * Last name - .user-last-name-wrap
 * Nickname - .user-nickname-wrap
 * Biographical Info - .user-description-wrap
 */

if ( ! function_exists( 'hide_profile_fields_with_css' ) ) {
	function hide_profile_fields_with_css() {
		?><style>
		.user-rich-editing-wrap,
		.user-syntax-highlighting-wrap,
		.user-admin-color-wrap,
		.user-comment-shortcuts-wrap,
		.show-admin-bar,
		.user-language-wrap,
		.user-first-name-wrap,
		.user-last-name-wrap,
		.user-description-wrap,
		.user-url-wrap {
		display: none;
		}</style>
		<?php
	}

	add_action(
		'admin_init',
		function () {
			add_action( 'admin_print_scripts-profile.php', 'hide_profile_fields_with_css' );
			add_action( 'admin_print_scripts-user-edit.php', 'hide_profile_fields_with_css' );
		}
	);
}
