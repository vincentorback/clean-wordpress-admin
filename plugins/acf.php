<?php

/**
 * Hide ACF settings menu
 */
add_filter( 'acf/settings/show_admin', '__return_false' );

/**
 * Remove ACF from admin menu
 */
add_action(
	'admin_menu',
	function () {
		// Remove ACF
		remove_menu_page( 'edit.php?post_type=acf-field-group' );

		// Remove ACF -> Edit
		remove_submenu_page( 'edit.php?post_type=acf-field-group', 'post-new.php?post_type=acf-field-group' );

		// Remove ACF -> Tools
		remove_submenu_page( 'edit.php?post_type=acf-field-group', 'acf-settings-tools' );

		// Remove ACF -> Updates
		remove_submenu_page( 'edit.php?post_type=acf-field-group', 'acf-settings-updates' );

		// Remove custom ACF Options page
		remove_menu_page( 'acf-options-name-of-page' );
	},
	999
);
