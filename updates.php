<?php

/**
 * Disable update notifcations.
 */

// Core update notifications
add_filter('pre_site_transient_update_core', 'last_checked_now');

// Plugin update notifications
add_filter('pre_site_transient_update_plugins', 'last_checked_now');

// Theme update notifications
add_filter('pre_site_transient_update_themes', 'last_checked_now');

// Core translation notifications
add_filter('site_transient_update_core', 'remove_translations');

// Plugin translation notifications
add_filter('site_transient_update_plugins', 'remove_translations');

// Theme translation notifications
add_filter('site_transient_update_themes', 'remove_translations');

function last_checked_now( $transient )
{
    include ABSPATH . WPINC . '/version.php';
    $current = new stdClass;
    $current->updates = array();
    $current->version_checked = $wp_version;
    $current->last_checked = time();

    return $current;
}

function remove_translations( $transient )
{
    if (is_object($transient) && isset($transient->translations) ) {
        $transient->translations = array();
    }

    return $transient;
}


/**
 * Remove actions that checks for updates
 */
add_action(
    'admin_init', function () {
        remove_action('wp_maybe_auto_update', 'wp_maybe_auto_update');
        remove_action('admin_init', 'wp_maybe_auto_update');
        remove_action('admin_init', 'wp_auto_update_core');
        wp_clear_scheduled_hook('wp_maybe_auto_update');
    }
);


/**
 * Disable automatic core updates
 */
add_filter('automatic_updater_disabled', '__return_true');
add_filter('allow_minor_auto_core_updates', '__return_false');
add_filter('allow_major_auto_core_updates', '__return_false');
add_filter('allow_dev_auto_core_updates', '__return_false');
add_filter('auto_update_core', '__return_false');
add_filter('wp_auto_update_core', '__return_false');
add_filter('auto_core_update_send_email', '__return_false');
add_filter('send_core_update_notification_email', '__return_false');
add_filter('automatic_updates_send_debug_email', '__return_false');
add_filter('automatic_updates_is_vcs_checkout', '__return_true');


/**
 * Disable automatic plugin updates
 */
add_filter('auto_update_plugin', '__return_false');


/**
 * Disable automatic theme updates
 */
add_filter('auto_update_theme', '__return_false');


/**
 * Disable automatic translation updates
 */
add_filter('auto_update_translation', '__return_false');
