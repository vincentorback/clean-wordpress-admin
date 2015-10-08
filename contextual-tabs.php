<?php

/**
 * Remove Help Tab
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

   // Add custom tab
   $screen->add_help_tab( array(
     'id' => 'my-help-tab',             // Unique id for the tab
     'title' => 'My help tab',          // Unique visible title for the tab
     'content' => '<p>Hello world!</p>' // Actual help text
  ));
 }, 999, 3);


/**
 * Remove Screen Options tab
 */
 add_filter( 'screen_options_show_screen', '__return_false' );
