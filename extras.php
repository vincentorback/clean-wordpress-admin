<?php

/**
 * Check if on posts-page
 */
function is_page_for_posts () {
  return ( is_home() || ( is_archive() && ! is_post_type_archive() ) );
}


/**
 * Check if is search page
 * @return boolean [description]
 */
function is_search_page () {
  if ( is_search() ) {
    return true;
  }

  $search_template_page = get_pages_with_template( 'search.php' );

  if ( $search_template_page && is_page( $search_template_page[0]->ID ) ) {
    return true;
  }
}


/**
 * Get pages using a specific template
 * @param $template - Name of template file, eg 'template-contact.php'
 */
function get_pages_by_template( $template ) {
  return get_pages(array(
    'meta_key' => '_wp_page_template',
    'meta_value' => $template
  ));
}


/**
 * Get page depth
 */
function get_page_depth ( $page ) {
  if ( ! $page ) {
    return;
  }

  $parent_id  = $page->post_parent;
  $depth = 0;

  while ( $parent_id > 0 ) {
    $parent = get_page( $parent_id );
    $parent_id = $parent->post_parent;
    $depth++;
  }

  return $depth;
}


/**
 * Nice debugging replacement to var_dump
 * @param $data Object you want to test.
 */
function show ( $data ) {
  echo '<pre style="box-sizing: border-box; min-height: 50vh; resize: vertical;
        outline: 2px solid; background: #fff; font: 13px/1.3 monospace">';
  print_r( $data );
  echo '</pre>';
}


/**
 * Stay logged in for longer
 * @link https://developer.wordpress.org/reference/hooks/auth_cookie_expiration/
 */
add_filter( 'auth_cookie_expiration', function () {
  return 31556926; // 1 year
});
