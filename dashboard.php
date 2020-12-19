<?php

/**
 * Removing dashboard widgets.
 *
 * @link https://developer.wordpress.org/reference/functions/remove_meta_box/
 */
add_action(
	'wp_dashboard_setup',
	function () {
		// Remove the 'Welcome' panel
		remove_action( 'welcome_panel', 'wp_welcome_panel' );

		// Remove 'Site health' metabox
		remove_meta_box( 'dashboard_site_health', 'dashboard', 'normal' );

		// Remove the 'At a Glance' metabox
		remove_meta_box( 'dashboard_right_now', 'dashboard', 'normal' );

		// Remove the 'Activity' metabox
		remove_meta_box( 'dashboard_activity', 'dashboard', 'normal' );

		// Remove the 'WordPress News' metabox
		remove_meta_box( 'dashboard_primary', 'dashboard', 'side' );

		// Remove the 'Quick Draft' metabox
		remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );
	}
);

/**
 * Remove access to the dashboard
*/
add_action(
	'admin_init',
	function () {
		global $pagenow; // Get current page
		$redirect = get_admin_url( null, 'edit.php' ); // Where to redirect

		if ( $pagenow == 'index.php' ) {
			wp_redirect( $redirect, 301 );
			exit;
		}
	}
);
