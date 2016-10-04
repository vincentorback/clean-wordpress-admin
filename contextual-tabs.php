<?php

/**
 * Remove Help Tabs
 * @link https://codex.wordpress.org/Adding_Contextual_Help_to_Administration_Menus
 *
 * @param $old_help
 * @param $screen_id
 * @param $screen
 */
add_filter( 'contextual_help', function ( $old_help, $screen_id, $screen ) {
  // Remove all help tabs
  $screen->remove_help_tabs();

  // Remove specific tabs
  $screen->remove_help_tab( 'overview' );
  $screen->remove_help_tab( 'managing-pages' );
  $screen->remove_help_tab( 'managing-pages' );
}, 999, 3);


/**
 * Remove Screen Options tab
 * @link https://developer.wordpress.org/reference/hooks/screen_options_show_screen/
 */
add_filter( 'screen_options_show_screen', '__return_false' );
