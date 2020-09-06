<?php

/**
 * Don't log failed logins
 *
 * @link https://github.com/bonny/WordPress-Simple-History/
 */
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

/**
 * Remove the "Clear log"-button, so a user with admin access can not clear the log
 * and wipe their mischievous behaviors :)
 *
* @link https://github.com/bonny/WordPress-Simple-History/
*/
add_filter(
'simple_history/user_can_clear_log',
function ( $user_can_clear_log ) {
$user_can_clear_log = false;
return $user_can_clear_log;
}
);
