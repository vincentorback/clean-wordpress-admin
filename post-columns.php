<?php

/**
 * Removed post columns
 * @link https://codex.wordpress.org/Plugin_API/Filter_Reference/manage_posts_columns
 * @link https://codex.wordpress.org/Plugin_API/Filter_Reference/manage_pages_columns
 */
add_action( 'admin_init' , function () {

  add_filter( 'manage_posts_columns', function ( $columns ) {
    unset(
      $columns['cb'],
      $columns['title'],
      $columns['author'],
      $columns['categories'],
      $columns['tags'],
      $columns['comments'],
      $columns['date']
    );

    return $columns;
  });

  add_filter( 'manage_page_columns', function ( $columns ) {
    unset(
      $columns['cb'],
      $columns['title'],
      $columns['author'],
      $columns['categories'],
      $columns['tags'],
      $columns['comments'],
      $columns['date']
    );

    return $columns;
  });

});
