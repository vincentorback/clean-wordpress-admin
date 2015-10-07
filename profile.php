<?php

/**
 * Hide Personal Options settings
 *
 * Keyboard Short - .user-comment-shortcuts-wrap
 * Admin Color Scheme - .user-admin-color-wrap
 * Visual Editor - .user-rich-editing-wrap
 * Show Toolbar - .show-admin-bar
 */
add_action( 'admin_print_scripts-profile.php', function () {
  ?><style>.user-rich-editing-wrap,.user-comment-shortcuts-wrap,.user-admin-color-wrap,.show-admin-bar{display:none;}</style><?php
});


/**
 * Remove default user contact fields
 *
 * @return Array of contact methods
 */
add_filter( 'user_contactmethods', function ( $user_contact ) {
  // Remove existing
  unset( $user_contact['aim'] );
  unset( $user_contact['jabber'] );
  unset( $user_contact['yim'] );

  // Add new
  $user_contact['phone'] = 'Phone';
  $user_contact['twitter'] = 'Twitter';
  $user_contact['facebook'] = 'Facebook';

  return $user_contact;
});


/**
 * Removes the "About Yourself / Biographical Info" field.
 * Looks pretty bad but it’s this or jQuery :/
 *
 * @param $buffer Output buffer
 */
function remove_plain_bio( $buffer) {
  $titles = array( '#<h3>About Yourself</h3>#', '#<h3>About the user</h3>#' );
  $buffer = preg_replace( $titles, '<h3>Password</h3>', $buffer, 1 );
  $biotable = '#<h3>Password</h3>.+?<table.+?/tr>#s';
  $buffer = preg_replace( $biotable,'<h3>Password</h3> <table class="form-table">', $buffer, 1 );
  return $buffer;
}

add_action( 'admin_head', function () {
  ob_start( 'remove_plain_bio' );
});

add_action( 'admin_footer', function () {
  ob_end_flush();
});
