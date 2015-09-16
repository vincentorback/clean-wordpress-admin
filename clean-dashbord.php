<?php

/**
 * Removing unnecessary dashboard widgets
 */
function remove_dashboard_widgets() {
  remove_meta_box('dashboard_incoming_links', 'dashboard', 'normal');
  remove_meta_box('dashboard_plugins', 'dashboard', 'normal');
  remove_meta_box('dashboard_primary', 'dashboard', 'normal');
  remove_meta_box('dashboard_secondary', 'dashboard', 'normal');
  remove_meta_box('dashboard_quick_press', 'dashboard', 'normal');
}

add_action('admin_init', 'remove_dashboard_widgets');
