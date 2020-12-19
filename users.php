<?php

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
 * Biographical Info - .user-description-wrap
 */

function hide_profile_fields_with_css() {
	?><style>
	.user-rich-editing-wrap,
	.user-syntax-highlighting-wrap,
	.user-comment-shortcuts-wrap,
	.user-admin-color-wrap,
	.user-url-wrap {
	display: none;
	}</style>
	<?php
}

function hide_profile_fields_with_javascript() {
	$fields = array(
		'first_name',
		'last_name',
		'url',
		'role',
	);

	echo '<script>jQuery(document).ready(function(){';
	foreach ( $fields as $field ) {
		echo "jQuery('#{$field}').parents('tr').remove();";
	}
	echo '})</script>';
}

add_action(
	'admin_init',
	function () {
		add_action( 'admin_print_scripts-profile.php', 'hide_profile_fields_with_css' );
		add_action( 'admin_print_scripts-user-edit.php', 'hide_profile_fields_with_css' );
		add_action( 'admin_print_scripts-user-new.php', 'hide_profile_fields_with_javascript' );
	}
);
