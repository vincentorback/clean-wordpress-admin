<?php

/**
 * Remove "Remember me" option from login form
 */
add_action(
	'login_head',
	function () {
		echo '<style type="text/css">.forgetmenot { display:none; }</style>';
	}
);



/**
 * Remove the language switcher
 */
add_filter( 'login_display_language_dropdown', '__return_false' );



/**
 * Change logo link url, instead of wordpress.org
 *
 * @link https://developer.wordpress.org/reference/hooks/login_headerurl/
 */
add_filter(
	'login_headerurl',
	function () {
		return home_url();
	}
);
