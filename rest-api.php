<?php

/**
 * Prefix REST API url
 * Default: "wp-json"
 * @link https://developer.wordpress.org/reference/hooks/rest_url_prefix/
 */
add_filter( 'rest_url_prefix', function () {
	return 'my_new_api_prefix';
});



/**
 * Hide REST API endpoints from non-authenticated users
 * In this example we hide the "users" endpoint
 * @link https://wordpress.stackexchange.com/a/378142/27127
 */
function users_permission_check ($existing_callback) {
  return function ($request) use($existing_callback) {
      if (! current_user_can('list_users')) {
          return new WP_Error(
              'rest_user_cannot_view',
              __( 'Sorry, you are not allowed to access users.' ),
              [ 'status' => rest_authorization_required_code() ]
          );
      }

      return $existing_callback($request);
  };
}

function api_users_endpoint_force_auth ($endpoints) {
  $users_get_route = &$endpoints['/wp/v2/users'][0];
  $users_get_route['permission_callback'] = users_permission_check($users_get_route['permission_callback']);

  $user_get_route = &$endpoints['/wp/v2/users/(?P<id>[\d]+)'][0];
  $user_get_route['permission_callback'] = users_permission_check($user_get_route['permission_callback']);

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
		add_filter( 'rest_jsonp_enabled', '__return_false' );

		remove_action( 'xmlrpc_rsd_apis', 'rest_output_rsd' );
		remove_action( 'wp_head', 'rest_output_link_wp_head', 10 );
		remove_action( 'template_redirect', 'rest_output_link_header', 11 );
	}
);
