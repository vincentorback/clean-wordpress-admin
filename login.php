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
