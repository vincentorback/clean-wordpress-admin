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
