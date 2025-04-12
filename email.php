<?php



/**
 * Disable all emails using wp_mail
 */
add_filter(
	'wp_mail',
	function ( $args ) {
		unset( $args['to'] );

		return $args;
	},
	10,
	1
);



/**
 * Disable sending password change emails
 */
add_filter( 'send_password_change_email', '__return_false' );

add_filter(
	'wp_password_change_notification_email',
	function ( $args ) {
		unset( $args['to'] );

		return $args;
	}
);



/**
 * Disable sending email change confirmation emails
 */
add_filter( 'send_email_change_email', '__return_false' );
