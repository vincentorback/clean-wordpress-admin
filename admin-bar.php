<?php

/**
 * Hide the admin bar on the front-end
 * @link https://codex.wordpress.org/Function_Reference/show_admin_bar
 */
add_filter( 'show_admin_bar', '__return_false' );


/**
 * Hide or create new menus and items in the admin bar.
 * @link https://codex.wordpress.org/Class_Reference/WP_Admin_Bar/add_menu
 *
 * Indentation shows sub-items.
 */
add_action( 'admin_bar_menu', function ( $admin_bar ) {

  $admin_bar->remove_menu( 'wp-logo' );            // Remove the WordPress logo
    $admin_bar->remove_menu( 'about' );            // Remove the about WordPress link
    $admin_bar->remove_menu( 'wporg' );            // Remove the about WordPress link
    $admin_bar->remove_menu( 'documentation' );    // Remove the WordPress documentation link
    $admin_bar->remove_menu( 'support-forums' );   // Remove the support forums link
    $admin_bar->remove_menu( 'feedback' );         // Remove the feedback link

  $admin_bar->remove_menu( 'site-name' );          // Remove the site name menu
    $admin_bar->remove_menu( 'view-site' );        // Remove the view site link

  $admin_bar->remove_menu( 'updates' );            // Remove the updates link
  $admin_bar->remove_menu( 'comments' );           // Remove the comments link
  $admin_bar->remove_menu( 'new-content' );        // Remove the content link
  $admin_bar->remove_menu( 'my-account' );         // Remove the user details tab

}, 999); // Needs to have low priority
