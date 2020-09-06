<?php

/**
 * Remove default roles
 * WARNING: This will delete the role completetly and you wont get it back unless you reinstall WordPress.
 *
 * @link https://developer.wordpress.org/reference/functions/remove_role/
 */
add_action(
	'admin_init',
	function () {
		remove_role( 'administrator' );
		remove_role( 'editor' );
		remove_role( 'author' );
		remove_role( 'contributor' );
		remove_role( 'subscriber' );
	}
);


/**
 * Remove user/role capabilities
 *
 * @link https://developer.wordpress.org/reference/classes/wp_role/remove_cap/
*/
add_action(
	'admin_init',
	function () {

		// Target (roles or user)
		$cap_target = get_role( 'editor' );
		// $cap_target = new WP_User(?); // The ID of the user to remove the capability from.

		// Super Admin
		$cap_target->remove_cap( 'manage_network' );
		$cap_target->remove_cap( 'manage_sites' );
		$cap_target->remove_cap( 'manage_network_users' );
		$cap_target->remove_cap( 'manage_network_plugins' );
		$cap_target->remove_cap( 'manage_network_themes' );
		$cap_target->remove_cap( 'manage_network_options' );

		// Administrator
		$cap_target->remove_cap( 'activate_plugins' );
		$cap_target->remove_cap( 'delete_others_pages' );
		$cap_target->remove_cap( 'delete_others_posts' );
		$cap_target->remove_cap( 'delete_posts' );
		$cap_target->remove_cap( 'delete_published_pages' );
		$cap_target->remove_cap( 'edit_dashboard' );
		$cap_target->remove_cap( 'edit_theme_options' );
		$cap_target->remove_cap( 'export' );
		$cap_target->remove_cap( 'import' );
		$cap_target->remove_cap( 'list_users' );
		$cap_target->remove_cap( 'manage_options' );
		$cap_target->remove_cap( 'promote_users' );
		$cap_target->remove_cap( 'remove_users' );
		$cap_target->remove_cap( 'switch_themes' );

		// Additional Admin Capabilities (available on single sites)
		$cap_target->remove_cap( 'update_core' );
		$cap_target->remove_cap( 'update_plugins' );
		$cap_target->remove_cap( 'update_themes' );
		$cap_target->remove_cap( 'install_plugins' );
		$cap_target->remove_cap( 'install_themes' );
		$cap_target->remove_cap( 'delete_themes' );
		$cap_target->remove_cap( 'delete_plugins' );
		$cap_target->remove_cap( 'edit_plugins' );
		$cap_target->remove_cap( 'edit_themes' );
		$cap_target->remove_cap( 'edit_files' );
		$cap_target->remove_cap( 'edit_users' );
		$cap_target->remove_cap( 'create_users' );
		$cap_target->remove_cap( 'delete_users' );

		// Editor
		$cap_target->remove_cap( 'delete_others_pages' );
		$cap_target->remove_cap( 'delete_others_posts' );
		$cap_target->remove_cap( 'delete_pages' );
		$cap_target->remove_cap( 'delete_private_pages' );
		$cap_target->remove_cap( 'delete_private_posts' );
		$cap_target->remove_cap( 'delete_published_pages' );
		$cap_target->remove_cap( 'edit_others_pages' );
		$cap_target->remove_cap( 'edit_others_posts' );
		$cap_target->remove_cap( 'edit_pages' );
		$cap_target->remove_cap( 'edit_private_pages' );
		$cap_target->remove_cap( 'edit_private_posts' );
		$cap_target->remove_cap( 'edit_published_pages' );
		$cap_target->remove_cap( 'manage_links' );
		$cap_target->remove_cap( 'moderate_comments' );
		$cap_target->remove_cap( 'publish_pages' );
		$cap_target->remove_cap( 'read_private_pages' );
		$cap_target->remove_cap( 'read_private_posts' );
		$cap_target->remove_cap( 'unfiltered_html' ); // not available on multisites

		// Author
		$cap_target->remove_cap( 'edit_published_posts' );
		$cap_target->remove_cap( 'delete_published_posts' );
		$cap_target->remove_cap( 'publish_posts' );
		$cap_target->remove_cap( 'upload_files' );

		// Contributor
		$cap_target->remove_cap( 'edit_posts' );
		$cap_target->remove_cap( 'delete_posts' );

		// Subscriber
		$cap_target->remove_cap( 'read' );

		// Not available to anyone
		$cap_target->remove_cap( 'unfiltered_upload' );
	}
);
