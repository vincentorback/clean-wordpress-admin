<?php

/**
 * Remove Help Tabs
 *
 * @link https://developer.wordpress.org/reference/classes/wp_screen/remove_help_tabs/
 * @link https://developer.wordpress.org/reference/classes/wp_screen/remove_help_tab/
 */
add_action(
	'admin_head',
	function () {
		$screen = get_current_screen();

		// Remove all tabs
		$screen->remove_help_tabs();

		// Remove specific
		$screen->remove_help_tab( 'id-of-tab-you-want-to-remove' );
	}
);


/**
 * Remove Screen Options tab
 *
 * @link https://developer.wordpress.org/reference/hooks/screen_options_show_screen/
 */
add_filter( 'screen_options_show_screen', '__return_false' );
