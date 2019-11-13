<?php

/**
 * Remove Help Tabs
 *
 * @link https://codex.wordpress.org/Adding_Contextual_Help_to_Administration_Menus
 *
 * @param $old_help
 * @param $screen_id
 * @param $screen
 */
add_filter(
    'contextual_help', function ( $old_help, $screen_id, $screen ) {
        // Remove all help tabs
        $screen->remove_help_tabs();

        // Remove specific tabs
        $screen->remove_help_tab('overview');

        $screen->remove_help_tab('help-navigation');
        $screen->remove_help_tab('help-layout');
        $screen->remove_help_tab('help-content');

        $screen->remove_help_tab('attachment-details');
        $screen->remove_help_tab('managing-pages');
        $screen->remove_help_tab('managing-pages');

        $screen->remove_help_tab('moderating-comments');

        $screen->remove_help_tab('adding-themes');
        $screen->remove_help_tab('customize-preview-themes');

        $screen->remove_help_tab('compatibility-problems');
        $screen->remove_help_tab('adding-plugins');

        $screen->remove_help_tab('screen-display');
        $screen->remove_help_tab('actions');
        $screen->remove_help_tab('user-roles');

        $screen->remove_help_tab('press-this');
        $screen->remove_help_tab('converter');

        $screen->remove_help_tab('options-postemail');
        $screen->remove_help_tab('options-services');
        $screen->remove_help_tab('site-visibility');
        $screen->remove_help_tab('permalink-settings');
        $screen->remove_help_tab('custom-structures');
    }, 999, 3
);


/**
 * Remove Screen Options tab
 *
 * @link https://developer.wordpress.org/reference/hooks/screen_options_show_screen/
 */
add_filter('screen_options_show_screen', '__return_false');
