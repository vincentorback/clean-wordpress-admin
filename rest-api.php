<?php

/**
 * Prefix REST API url
 * Default: "wp-json"
 *
 * @link https://developer.wordpress.org/reference/hooks/rest_url_prefix/
 */
add_filter(
	'rest_url_prefix',
	function () {
		return 'my_new_api_prefix';
	}
);



/**
 * Hide REST API endpoints from non-authenticated users
 * In this example we hide the "users" endpoint
 *
 * @link https://wordpress.stackexchange.com/a/378142/27127
 */
function users_permission_check( $existing_callback ) {
	return function ( $request ) use ( $existing_callback ) {
		if ( ! current_user_can( 'list_users' ) ) {
			return new WP_Error(
				'rest_user_cannot_view',
				__( 'Sorry, you are not allowed to access users.' ),
				array( 'status' => rest_authorization_required_code() )
			);
		}

		return $existing_callback( $request );
	};
}

function api_users_endpoint_force_auth( $endpoints ) {
	$users_get_route                        = &$endpoints['/wp/v2/users'][0];
	$users_get_route['permission_callback'] = users_permission_check( $users_get_route['permission_callback'] );

	$user_get_route                        = &$endpoints['/wp/v2/users/(?P<id>[\d]+)'][0];
	$user_get_route['permission_callback'] = users_permission_check( $user_get_route['permission_callback'] );

	return $endpoints;
}

add_filter( 'rest_endpoints', 'api_users_endpoint_force_auth' );



/**
 * Fullt disable the REST API
 * (not recommended, will probably break stuff)
 */
add_action(
	'init',
	function () {
		add_filter( 'rest_enabled', '__return_false' );
	}
);





/**
 * Remove REST API endpoints for non-logged in users
 */
add_filter(
	'rest_authentication_errors',
	function ( $result ) {
		if (
		! empty( $result ) ||
		is_admin_request() ||
		is_customize_preview()
		) {
			return $result;
		}

		wp_send_json_error(
			array(
				'code'    => 'rest_not_logged_in',
				'message' => 'Sorry, you must be logged in to access this API.',
				'data'    => array(
					'status' => 401,
				),
			),
			401
		);
	}
);

function is_admin_request() {
	/**
	 * Get current URL.
	 *
	 * @link https://wordpress.stackexchange.com/a/126534
	 */
	$current_url = home_url( add_query_arg( null, null ) );

	/**
	 * Get admin URL and referrer.
	 *
	 * @link https://core.trac.wordpress.org/browser/tags/4.8/src/wp-includes/pluggable.php#L1076
	 */
	$admin_url = strtolower( admin_url() );
	$referrer  = strtolower( wp_get_referer() );

	// $requestFromBackend = is_rest() && str_contains($admin_url, '/wp-admin/') > 0 && !str_contains($admin_url, '/wp-admin/admin-ajax.php');

	// if ($requestFromBackend) {
	// return true;
	// }

	/**
	 * Check if this is a admin request. If true, it
	 * could also be a AJAX request from the frontend.
	 */
	if ( str_contains( $current_url, $admin_url ) ) {
		/**
		 * Check if the user comes from a admin page.
		 */
		if ( str_contains( $referrer, $admin_url ) ) {
			return true;
		} else {
			/**
			 * Check for AJAX requests.
			 *
			 * @link https://gist.github.com/zitrusblau/58124d4b2c56d06b070573a99f33b9ed#file-lazy-load-responsive-images-php-L193
			 */
			return ! wp_doing_ajax();
		}
	} else {
		return false;
	}
}
