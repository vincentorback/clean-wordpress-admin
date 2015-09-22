<?php

/**
 * Hide admin menu items. Can be both parents and children in
 * dropdowns. Specify link to parent and link to child.
 */
add_action( 'admin_head', function () {
  remove_menu_page( 'index.php' ); // Dashboard
  remove_menu_page( 'edit.php' ); // Posts
  remove_menu_page( 'upload.php' ); // Media
  remove_menu_page( 'edit.php?post_type=page' ); // Pages
  remove_menu_page( 'themes.php' ); // Appearance
  remove_menu_page( 'plugins.php' ); // Plugins
  remove_menu_page( 'users.php' ); // Users
  remove_menu_page( 'tools.php' ); // Tools
  remove_menu_page( 'options-general.php' ); // Settings

  remove_submenu_page( 'edit.php', 'edit-tags.php?taxonomy=category' ); // Posts -> Categories
  remove_submenu_page( 'edit.php', 'edit-tags.php?taxonomy=post_tag' ); // Posts -> Tags

  remove_submenu_page( 'themes.php', 'customize.php?return=%2Fwp-admin%2Fthemes.php' ); // Appearance -> Customize, if your WordPress folder is located elsewhere, this path must be updated

  remove_submenu_page( 'options-general.php', 'options-writing.php' ); // Settings -> Writing
  remove_submenu_page( 'options-general.php', 'options-reading.php' ); // Settings -> Reading
  remove_submenu_page( 'options-general.php', 'options-discussion.php' ); // Settings -> Discussion
  remove_submenu_page( 'options-general.php', 'options-media.php' ); // Settings -> Media
  remove_submenu_page( 'options-general.php', 'options-permalink.php' ); // Settings -> Permalinks
});
