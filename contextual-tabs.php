<?php

/**
 * Remove Help Tab
 */
 add_filter( 'contextual_help', function ($old_help, $screen_id, $screen) {

   // Remove all help tabs
   $screen->remove_help_tabs();

   // Remove specific tabs
   $screen->remove_help_tab('overview');
   $screen->remove_help_tab('managing-pages');
   $screen->remove_help_tab('managing-pages');

   // Add custom tab
   $screen->add_help_tab( array(
     'id' => 'my-help-tab',            //unique id for the tab
     'title' => 'My help tab',      //unique visible title for the tab
     'content' => '<p>Hello world!</p>'  //actual help text
  ));
 }, 999, 3);


/**
 * Remove Screen Options tab
 */
 add_filter('screen_options_show_screen', '__return_false');
