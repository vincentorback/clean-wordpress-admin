<?php

/**
 * Removing unnecessary dashboard widgets.
 */
add_action( 'admin_init', function () {
  // Removes the 'incoming links' metabox
  remove_meta_box( 'dashboard_incoming_links', 'dashboard', 'normal' );

  // Removes the 'plugins' metabox
  remove_meta_box( 'dashboard_plugins', 'dashboard', 'normal' );

  // Removes the 'WordPress News' metabox
  remove_meta_box( 'dashboard_primary', 'dashboard', 'normal' );

  // Removes the secondary metabox
  remove_meta_box( 'dashboard_secondary', 'dashboard', 'normal' );

  // Removes the 'Quick Draft' metabox
  remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );

  // Removes the 'Recent Drafts' metabox
  remove_meta_box( 'dashboard_recent_drafts', 'dashboard', 'side' );

  // Removes the 'Activity' metabox
  remove_meta_box( 'dashboard_recent_comments', 'dashboard', 'normal' );

  // Removes the 'At a Glance' metabox
  remove_meta_box( 'dashboard_right_now', 'dashboard', 'normal' );

  // Removes the 'Activity' metabox (since 3.8)
  remove_meta_box( 'dashboard_activity', 'dashboard', 'normal' );
});


/**
 * Remove access to the dashboard
 */
add_action( 'admin_init', function () {
	global $pagenow; // Get current page
  $redirect = get_admin_url( null, 'edit.php' ); // Where to redirect

	if ( $pagenow == 'index.php' ) {
		wp_redirect( $redirect, 301 );
		exit;
	}
});
