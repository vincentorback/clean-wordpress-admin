<?php

/**
 * Remove Help Tab
 */
 add_filter( 'contextual_help', function ($old_help, $screen_id, $screen) {
   $screen->remove_help_tabs();
 }, 999, 3);

/**
 * Remove Screen Options tab
 */
 add_filter('screen_options_show_screen', '__return_false');
