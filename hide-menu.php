<?php

/**
 * Hide admin menu items. Can be both parents and children in
 * dropdowns. Specify link to parent and link to child.
 * @return [type] [description]
 */
function hide_menu() {
  if (!current_user_can('administrator')) {

    remove_menu_page('edit.php');
    remove_menu_page('upload.php');
    remove_menu_page('edit-comments.php');

    remove_submenu_page( 'themes.php', 'customize.php' );
    remove_submenu_page( 'themes.php', 'customize.php' );

    remove_submenu_page( 'edit.php', 'widgets.php' );

    remove_submenu_page( 'options-general.php', 'options-permalink.php' );
    remove_submenu_page( 'options-general.php', 'options-writing.php' );
    remove_submenu_page( 'options-general.php', 'options-media.php' );
    remove_submenu_page( 'options-general.php', 'options-reading.php' );
    remove_submenu_page( 'options-general.php', 'options-discussion.php' );

    remove_menu_page( 'tools.php' );
  }
}

add_action('admin_head', 'hide_menu');
