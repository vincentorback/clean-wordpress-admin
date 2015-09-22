<?php


/**
 * Updating role/user capabilities
 *
 * `remove_cap` can be changed to `app_cap`
 */
add_action( 'admin_init', function () {
  // Target (roles or user)
  $cap_target = get_role( 'editor' );
  /* $cap_target = new WP_User( $user_id ); */

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
  $cap_target->remove_cap( 'delete_pages' );
  $cap_target->remove_cap( 'delete_posts' );
  $cap_target->remove_cap( 'delete_private_pages' );
  $cap_target->remove_cap( 'delete_private_posts' );
  $cap_target->remove_cap( 'delete_published_pages' );
  $cap_target->remove_cap( 'delete_published_posts' );
  $cap_target->remove_cap( 'edit_dashboard' );
  $cap_target->remove_cap( 'edit_others_pages' );
  $cap_target->remove_cap( 'edit_others_posts' );
  $cap_target->remove_cap( 'edit_pages' );
  $cap_target->remove_cap( 'edit_posts' );
  $cap_target->remove_cap( 'edit_private_pages' );
  $cap_target->remove_cap( 'edit_private_posts' );
  $cap_target->remove_cap( 'edit_published_pages' );
  $cap_target->remove_cap( 'edit_published_posts' );
  $cap_target->remove_cap( 'edit_theme_options' );
  $cap_target->remove_cap( 'export' );
  $cap_target->remove_cap( 'import' );
  $cap_target->remove_cap( 'list_users' );
  $cap_target->remove_cap( 'manage_categories' );
  $cap_target->remove_cap( 'manage_links' );
  $cap_target->remove_cap( 'manage_options' );
  $cap_target->remove_cap( 'moderate_comments' );
  $cap_target->remove_cap( 'promote_users' );
  $cap_target->remove_cap( 'publish_pages' );
  $cap_target->remove_cap( 'publish_posts' );
  $cap_target->remove_cap( 'read_private_pages' );
  $cap_target->remove_cap( 'read_private_posts' );
  $cap_target->remove_cap( 'read' );
  $cap_target->remove_cap( 'remove_users' );
  $cap_target->remove_cap( 'switch_themes' );
  $cap_target->remove_cap( 'upload_files' );

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
  $cap_target->remove_cap( 'unfiltered_html' );

  // Editor
  $cap_target->remove_cap( 'delete_others_pages' );
  $cap_target->remove_cap( 'delete_others_posts' );
  $cap_target->remove_cap( 'delete_pages' );
  $cap_target->remove_cap( 'delete_posts' );
  $cap_target->remove_cap( 'delete_private_pages' );
  $cap_target->remove_cap( 'delete_private_posts' );
  $cap_target->remove_cap( 'delete_published_pages' );
  $cap_target->remove_cap( 'delete_published_posts' );
  $cap_target->remove_cap( 'edit_others_pages' );
  $cap_target->remove_cap( 'edit_others_posts' );
  $cap_target->remove_cap( 'edit_pages' );
  $cap_target->remove_cap( 'edit_posts' );
  $cap_target->remove_cap( 'edit_private_pages' );
  $cap_target->remove_cap( 'edit_private_posts' );
  $cap_target->remove_cap( 'edit_published_pages' );
  $cap_target->remove_cap( 'edit_published_posts' );
  $cap_target->remove_cap( 'manage_categories' );
  $cap_target->remove_cap( 'manage_links' );
  $cap_target->remove_cap( 'moderate_comments' );
  $cap_target->remove_cap( 'publish_pages' );
  $cap_target->remove_cap( 'publish_posts' );
  $cap_target->remove_cap( 'read' );
  $cap_target->remove_cap( 'read_private_pages' );
  $cap_target->remove_cap( 'read_private_posts' );
  $cap_target->remove_cap( 'unfiltered_html' ); // not available on multisites
  $cap_target->remove_cap( 'upload_files' );

  // Author
  $cap_target->remove_cap( 'delete_posts' );
  $cap_target->remove_cap( 'delete_published_posts' );
  $cap_target->remove_cap( 'edit_posts' );
  $cap_target->remove_cap( 'edit_published_posts' );
  $cap_target->remove_cap( 'publish_posts' );
  $cap_target->remove_cap( 'read' );
  $cap_target->remove_cap( 'upload_files' );

  // Contributor
  $cap_target->remove_cap( 'delete_posts' );
  $cap_target->remove_cap( 'edit_posts' );
  $cap_target->remove_cap( 'read' );

  // Subscriber
  $cap_target->remove_cap( 'read' );

  // Not available to anyone
  $cap_target->remove_cap( 'unfiltered_upload' );
});
