<?php

/**
 * Hide admin menu items. Can be both parents and children in dropdowns.
 * Specify link to parent and link to child.
 *
 * @link https://developer.wordpress.org/reference/functions/remove_menu_page/
 */
add_action(
	'admin_menu',
	function () {
		// Remove Dashboard
		remove_menu_page( 'index.php' );
		// Remove Dashboard -> Update Core notice
		remove_submenu_page( 'index.php', 'update-core.php' );

		// Remove Posts
		remove_menu_page( 'edit.php' );
		// Remove Posts -> New post
		remove_submenu_page( 'edit.php', 'post-new.php' );
		// Remove Posts -> Categories
		remove_submenu_page( 'edit.php', 'edit-tags.php?taxonomy=category' );
		// Remove Posts -> Tags
		remove_submenu_page( 'edit.php', 'edit-tags.php?taxonomy=post_tag' );

		// Remove Media
		remove_menu_page( 'upload.php' );
		// Remove Media -> Library
		remove_submenu_page( 'upload.php', 'upload.php' );
		// Remove Media -> Add new media
		remove_submenu_page( 'upload.php', 'media-new.php' );

		// Remove Pages
		remove_menu_page( 'edit.php?post_type=page' );
		// Remove Pages -> All pages
		remove_submenu_page( 'edit.php?post_type=page', 'edit.php?post_type=page' );
		// Remove Pages -> Add new page
		remove_submenu_page( 'edit.php?post_type=page', 'post-new.php?post_type=page' );

		// Remove Comments
		remove_menu_page( 'edit-comments.php' );

		// Remove Appearance
		remove_menu_page( 'themes.php' );
		// Remove Appearance -> Themes
		remove_submenu_page( 'themes.php', 'themes.php' );
		// Remove Appearance -> Customize
		remove_submenu_page( 'themes.php', 'customize.php?return=' . urlencode( $_SERVER['REQUEST_URI'] ) );

		// Remove Appearance -> Widgets
		remove_submenu_page( 'themes.php', 'widgets.php' );
		// Remove Appearance -> Menus
		remove_submenu_page( 'themes.php', 'nav-menus.php.php' );
		// Remove Appearance -> Editor
		remove_submenu_page( 'themes.php', 'theme-editor.php' );

		// Remove Plugins
		remove_menu_page( 'plugins.php' );
		// Remove Plugins -> Installed plugins
		remove_submenu_page( 'plugins.php', 'plugins.php' );
		// Remove Plugins -> Add new plugins
		remove_submenu_page( 'plugins.php', 'plugin-install.php' );
		// Remove Plugins -> Plugin editor
		remove_submenu_page( 'plugins.php', 'plugin-editor.php' );

		// Remove Users
		remove_menu_page( 'users.php' );
		// Remove Users -> Users
		remove_submenu_page( 'users.php', 'users.php' );
		// Remove Users -> New user
		remove_submenu_page( 'users.php', 'user-new.php' );
		// Remove Users -> Your profile
		remove_submenu_page( 'users.php', 'profile.php' );

		// Remove Tools
		remove_menu_page( 'tools.php' );
		// Remove Tools -> Available Tools
		remove_submenu_page( 'tools.php', 'tools.php' );
		// Remove Tools -> Import
		remove_submenu_page( 'tools.php', 'import.php' );
		// Remove Tools -> Export
		remove_submenu_page( 'tools.php', 'export.php' );

		// Remove Settings
		remove_menu_page( 'options-general.php' );
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
	},
	999
);
