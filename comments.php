<?php

/**
 * Remove default fields in comment form
 *
 * @link https://developer.wordpress.org/reference/hooks/comment_form_default_fields/
 */
function disable_comment_fields( $fields )
{
    unset($fields['author']);
    unset($fields['email']);
    unset($fields['url']);

    return $fields;
}

add_filter('comment_form_default_fields', 'disable_comment_fields');
