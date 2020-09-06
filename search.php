<?php

/**
 * Disable search query
 *
 * @param $query [description]
 * @param $error Set to false to redirect to same page
 */
add_action(
	'parse_query',
	function ( $query, $error = true ) {
		if ( is_search() ) {
			$query->is_search       = false;
			$query->query_vars['s'] = false;
			$query->query['s']      = false;

			// Send to 404
			$query->is_404 = true;
		}
	}
);


/**
 * Disable search form
 *
 * @link https://developer.wordpress.org/reference/hooks/get_search_form/
 */
add_filter( 'get_search_form', '__return_empty_string' );
