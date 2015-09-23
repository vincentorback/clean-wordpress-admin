<?php

/**
 * Hide or create new menus and items in the admin bar.
 */
add_action( 'admin_bar_menu', function ( $admin_bar ) {

  $admin_bar->remove_menu('wp-logo');          // Remove the WordPress logo
    $admin_bar->remove_menu('about');            // Remove the about WordPress link
    $admin_bar->remove_menu('wporg');            // Remove the about WordPress link
    $admin_bar->remove_menu('documentation');    // Remove the WordPress documentation link
    $admin_bar->remove_menu('support-forums');   // Remove the support forums link
    $admin_bar->remove_menu('feedback');         // Remove the feedback link

  $admin_bar->remove_menu('site-name');        // Remove the site name menu
    $admin_bar->remove_menu('view-site');        // Remove the view site link

  $admin_bar->remove_menu('updates');          // Remove the updates link
  $admin_bar->remove_menu('comments');         // Remove the comments link
  $admin_bar->remove_menu('new-content');      // Remove the content link
  $admin_bar->remove_menu('my-account');       // Remove the user details tab


  // Add custom menu
  $admin_bar->add_menu( array(
    'id'    => 'my_bar_menu',
    'title' => 'My bar menu',
    'meta'  => array( 'class' => 'my-bar-menu' )
  ));

  // Add custom node
  $admin_bar->add_node( array(
    'id'    => 'my_bar_node',
    'title' => 'My bar node',
    'parent' => 'my_bar_menu',
    'href'  => 'http://mysite.com/my-page',
    'meta'  => array( 'class' => 'my-bar-node' )
  ));

}, 999); // Needs to have low priority
