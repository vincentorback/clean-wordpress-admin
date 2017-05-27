<?php

/**
 * Hide Personal Options settings
 * @link https://codex.wordpress.org/Plugin_API/Action_Reference/admin_print_scripts
 *
 * Keyboard Short - .user-comment-shortcuts-wrap
 * Admin Color Scheme - .user-admin-color-wrap
 * Visual Editor - .user-rich-editing-wrap
 * Show Toolbar - .show-admin-bar
 * Biographical Info - .user-description-wrap
 */
add_action( 'admin_print_scripts-profile.php', function () {
  ?><style>
  .user-rich-editing-wrap,
  .user-comment-shortcuts-wrap,
  .user-admin-color-wrap,
  .show-admin-bar,
  .user-description-wrap {
    display: none;
  }</style><?php
});


/**
 * Remove default user contact fields
 * @link https://codex.wordpress.org/Plugin_API/Filter_Reference/user_contactmethods
 *
 * @param $user_contact Existing contact methods
 * @return Array of contact methods
 */
add_filter( 'user_contactmethods', function ( $user_contact ) {
  unset( $user_contact['aim'] );
  unset( $user_contact['jabber'] );
  unset( $user_contact['yim'] );

  return $user_contact;
});
