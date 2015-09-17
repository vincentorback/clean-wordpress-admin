<?php

/**
 * Removing unnecessary dashboard widgets.
 * This will also remove the capability to show them using the "Screen options"
 */
add_action('admin_init', function () {
  remove_meta_box('dashboard_incoming_links', 'dashboard', 'normal'); //Removes the 'incoming links' widget
  remove_meta_box('dashboard_plugins', 'dashboard', 'normal'); //Removes the 'plugins' widget
  remove_meta_box('dashboard_primary', 'dashboard', 'normal'); //Removes the 'WordPress News' widget
  remove_meta_box('dashboard_secondary', 'dashboard', 'normal'); //Removes the secondary widget
  remove_meta_box('dashboard_quick_press', 'dashboard', 'side'); //Removes the 'Quick Draft' widget
  remove_meta_box('dashboard_recent_drafts', 'dashboard', 'side'); //Removes the 'Recent Drafts' widget
  remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal'); //Removes the 'Activity' widget
  remove_meta_box('dashboard_right_now', 'dashboard', 'normal'); //Removes the 'At a Glance' widget
  remove_meta_box('dashboard_activity', 'dashboard', 'normal'); //Removes the 'Activity' widget (since 3.8)
});
