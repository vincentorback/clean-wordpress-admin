<?php

/**
 * Disable the REST API
 */
add_action(
	'init',
	function () {
		add_filter( 'rest_jsonp_enabled', '__return_false' );

		remove_action( 'xmlrpc_rsd_apis', 'rest_output_rsd' );
		remove_action( 'wp_head', 'rest_output_link_wp_head', 10 );
		remove_action( 'template_redirect', 'rest_output_link_header', 11 );
	}
);
