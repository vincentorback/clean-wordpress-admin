<?php

/**
 * Hide the admin bar on the front-end
 *
 * @link https://developer.wordpress.org/reference/hooks/show_admin_bar
 */
add_filter( 'show_admin_bar', '__return_false' );


/**
 * Hide or create new menus and items in the admin bar.
 * Indentation shows sub-items.
 *
 * @link https://developer.wordpress.org/reference/hooks/wp_before_admin_bar_render/
 */
add_action(
	'wp_before_admin_bar_render',
	function () {
		global $wp_admin_bar;

		$wp_admin_bar->remove_menu( 'wp-logo' );            // Remove the WordPress logo
		$wp_admin_bar->remove_menu( 'about' );            // Remove the about WordPress link
		$wp_admin_bar->remove_menu( 'wporg' );            // Remove the about WordPress link
		$wp_admin_bar->remove_menu( 'documentation' );    // Remove the WordPress documentation link
		$wp_admin_bar->remove_menu( 'support-forums' );   // Remove the support forums link
		$wp_admin_bar->remove_menu( 'feedback' );         // Remove the feedback link

		$wp_admin_bar->remove_menu( 'site-name' );          // Remove the site name menu
		$wp_admin_bar->remove_menu( 'view-site' );        // Remove the view site link
		$wp_admin_bar->remove_menu( 'dashboard' );        // Remove the dashboard link
		$wp_admin_bar->remove_menu( 'menus' );            // Remove the menus link

		$wp_admin_bar->remove_menu( 'customize' );          // Remove the site name menu

		$wp_admin_bar->remove_menu( 'updates' );            // Remove the updates link
		$wp_admin_bar->remove_menu( 'comments' );           // Remove the comments link

		$wp_admin_bar->remove_menu( 'new-content' );        // Remove the content link
		$wp_admin_bar->remove_menu( 'new-post' );         // Remove the new post link
		$wp_admin_bar->remove_menu( 'new-media' );        // Remove the new media link
		$wp_admin_bar->remove_menu( 'new-page' );         // Remove the new page link
		$wp_admin_bar->remove_menu( 'new-user' );         // Remove the new user link

		$wp_admin_bar->remove_menu( 'edit' );               // Remove the edit link

		$wp_admin_bar->remove_menu( 'my-account' );         // Remove the user details tab
		$wp_admin_bar->remove_menu( 'search' );             // Remove the search tab
	},
	999
);
