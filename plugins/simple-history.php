<?php

/**
 * Simple history
 *
 * @link https://github.com/bonny/WordPress-Simple-History
 */


// Don't log failed logins
add_filter(
	'simple_history/simple_logger/log_message_key',
	function ( $doLog, $loggerSlug, $messageKey, $SimpleLoggerLogLevelsLevel, $context ) {
		// Don't log login attempts to non existing users
		if ( 'SimpleUserLogger' == $loggerSlug && 'user_unknown_login_failed' == $messageKey ) {
			$doLog = false;
		}

		// Don't log failed logins to existing users
		if ( 'SimpleUserLogger' == $loggerSlug && 'user_login_failed' == $messageKey ) {
			$doLog = false;
		}

		return $doLog;
	},
	10,
	5
);


// Remove the "Clear log"-button, so a user with admin access can not clear the log
// and wipe their mischievous behaviors :)
add_filter(
	'simple_history/user_can_clear_log',
	function ( $user_can_clear_log ) {
		$user_can_clear_log = false;
		return $user_can_clear_log;
	}
);


// Skip adding things to the context table during logging.
// Useful if you don't want to add cool and possible super useful info to your logged events.
// Also nice to have if you want to make sure your database does not grow.
add_filter(
	'simple_history/log_insert_context',
	function ( $context, $data ) {
		unset( $context['_user_id'] );
		unset( $context['_user_login'] );
		unset( $context['_user_email'] );
		unset( $context['server_http_user_agent'] );

		return $context;
	},
	10,
	2
);


// Skip adding things to the context table during logging.
// Useful if you don't want to add cool and possible super useful info to your logged events.
// Also nice to have if you want to make sure your database does not grow.
add_filter(
	'simple_history/log_insert_context',
	function ( $context, $data ) {
		unset( $context['_user_id'] );
		unset( $context['_user_login'] );
		unset( $context['_user_email'] );
		unset( $context['server_http_user_agent'] );

		return $context;
	},
	10,
	2
);


// Hide some columns from the detailed context view popup window
add_filter(
	'simple_history/log_html_output_details_table/row_keys_to_show',
	function ( $logRowKeysToShow, $oneLogRow ) {
		$logRowKeysToShow['id']      = false;
		$logRowKeysToShow['logger']  = false;
		$logRowKeysToShow['level']   = false;
		$logRowKeysToShow['message'] = false;

		return $logRowKeysToShow;
	},
	10,
	2
);


// Hide some more columns from the detailed context view popup window
add_filter(
	'simple_history/log_html_output_details_table/context_keys_to_show',
	function ( $logRowContextKeysToShow, $oneLogRow ) {
		$logRowContextKeysToShow['plugin_slug']        = false;
		$logRowContextKeysToShow['plugin_name']        = false;
		$logRowContextKeysToShow['plugin_title']       = false;
		$logRowContextKeysToShow['plugin_description'] = false;

		return $logRowContextKeysToShow;
	},
	10,
	2
);


// Don't log failed logins
add_filter(
	'simple_history/simple_logger/log_message_key',
	function ( $doLog, $loggerSlug, $messageKey, $SimpleLoggerLogLevelsLevel, $context ) {
		// Don't log login attempts to non existing users
		if ( 'SimpleUserLogger' == $loggerSlug && 'user_unknown_login_failed' == $messageKey ) {
			$doLog = false;
		}

		// Don't log failed logins to existing users
		if ( 'SimpleUserLogger' == $loggerSlug && 'user_login_failed' == $messageKey ) {
			$doLog = false;
		}

		return $doLog;
	},
	10,
	5
);
