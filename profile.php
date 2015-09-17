<?php


/**
 * Remove default user fields
 */
add_filter('user_contactmethods', function () {
  // Add new
  $contactmethods['phone'] = 'Phone';
  $contactmethods['twitter'] = 'Twitter';
  $contactmethods['facebook'] = 'Facebook';

  // Remove existing
  unset($contactmethods['aim']);
  unset($contactmethods['jabber']);
  unset($contactmethods['yim']);

  return $contactmethods;
}, 10, 1);


/**
 * Removes the "About Yourself / Biographical Info" field.
 *
 * Looks pretty bad but it’s this or jQuery :/
 */
 function remove_plain_bio($buffer) {
  $titles = array('#<h3>About Yourself</h3>#', '#<h3>About the user</h3>#');
  $buffer = preg_replace($titles, '<h3>Password</h3>', $buffer, 1);
  $biotable = '#<h3>Password</h3>.+?<table.+?/tr>#s';
  $buffer = preg_replace($biotable,'<h3>Password</h3> <table class="form-table">', $buffer, 1);
  return $buffer;
}

add_action('admin_head', function () {
  ob_start("remove_plain_bio");
});

add_action('admin_footer', function () {
  ob_end_flush();
});
