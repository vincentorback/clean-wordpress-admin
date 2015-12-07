<?php

/**
 * Hide admin menu items. Can be both parents and children in dropdowns.
 * Specify link to parent and link to child.
 */
add_action( 'admin_head', function () {
  // Remove Dashboard
  remove_menu_page( 'index.php' );
  // Remove Posts
  remove_menu_page( 'edit.php' );
  // Remove Media
  remove_menu_page( 'upload.php' );
  // Remove Pages
  remove_menu_page( 'edit.php?post_type=page' );
  // Remove Comments
  remove_menu_page( 'edit-comments.php' );
  // Remove Appearance
  remove_menu_page( 'themes.php' );
  // Remove Plugins
  remove_menu_page( 'plugins.php' );
  // Remove Users
  remove_menu_page( 'users.php' );
  // Remove Tools
  remove_menu_page( 'tools.php' );
  // Remove Settings
  remove_menu_page( 'options-general.php' );

  // Remove Posts -> Categories
  remove_submenu_page( 'edit.php', 'edit-tags.php?taxonomy=category' );
  // Remove Posts -> Tags
  remove_submenu_page( 'edit.php', 'edit-tags.php?taxonomy=post_tag' );

  // Remove Appearance -> Themes
  remove_submenu_page( 'themes.php', 'themes.php' );
  // Remove Appearance -> Customize (if your WordPress folder is located elsewhere, this path must be updated)
  remove_submenu_page( 'themes.php', 'customize.php?return=%2Fwp-admin%2Fthemes.php' );
  // Remove Appearance -> Widgets
  remove_submenu_page( 'themes.php', 'widgets.php' );
  // Remove Appearance -> Menus
  remove_submenu_page( 'themes.php', 'nav-menus.php.php');
  // Remove Appearance -> Editor
  remove_submenu_page( 'themes.php', 'theme-editor.php');

  // Remove Settings -> Writing
  remove_submenu_page( 'options-general.php', 'options-writing.php' );
  // Remove Settings -> Reading
  remove_submenu_page( 'options-general.php', 'options-reading.php' );
  // Remove Settings -> Discussion
  remove_submenu_page( 'options-general.php', 'options-discussion.php' );
  // Remove Settings -> Media
  remove_submenu_page( 'options-general.php', 'options-media.php' );
  // Remove Settings -> Permalinks
  remove_submenu_page( 'options-general.php', 'options-permalink.php' );
});
