<?php


/**
 * Remove default user fields
 */
function update_profile_fields( $contactmethods ) {

  // Add new
  $contactmethods['phone'] = 'Phone';
  $contactmethods['twitter'] = 'Twitter';
  $contactmethods['facebook'] = 'Facebook';

  // Remove old
  unset($contactmethods['aim']);
  unset($contactmethods['jabber']);
  unset($contactmethods['yim']);

  return $contactmethods;
}

add_filter('user_contactmethods', 'update_profile_fields', 10, 1);


/**
 * Removes the "About Yourself / Biographical Info" field.
 *
 * Looks pretty bad but it’s this or jQuery :/
 */
function remove_plain_bio($buffer) {
    $titles = array('#<h3>About Yourself</h3>#', '#<h3>About the user</h3>#');
    $buffer = preg_replace($titles, '<h3>Password</h3>', $buffer, 1);
    $biotable = '#<h3>Password</h3>.+?<table.+?/tr>#s';
    $buffer = preg_replace($biotable, '<h3>Password</h3> <table>', $buffer, 1);
    return $buffer;
}

function profile_admin_buffer_start() {
  ob_start("remove_plain_bio");
}

function profile_admin_buffer_end() {
  ob_end_flush();
}

add_action('admin_head', 'profile_admin_buffer_start');
add_action('admin_footer', 'profile_admin_buffer_end');
