<?php

/**
 * Remove dashboard widgets
 *
 * @link https://developer.wordpress.org/reference/functions/remove_meta_box/
 */
add_action(
	'admin_init',
	function () {
		remove_meta_box( 'jetpack_summary_widget', 'dashboard', 'side' );
	}
);
