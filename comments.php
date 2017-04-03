<?php

/**
 * Remove default fields in comment form
 * @link https://codex.wordpress.org/Function_Reference/comment_form
 */
function disable_comment_fields( $fields ) {
  unset( $fields['author'] );
  unset( $fields['email'] );
  unset( $fields['url'] );

  return $fields;
}

add_filter( 'comment_form_default_fields', 'disable_comment_fields' );
