<?php


/**
 * Hide general options fields
 *
 * @link https://developer.wordpress.org/reference/hooks/admin_print_scripts-hook_suffix/
 *
 * Site icon - .site-icon-section
 */

add_action(
	'admin_print_scripts-options-general.php',
	function () {
		echo '<style>
    .site-icon-section
    {
      display: none;
    }
  </style>';
	}
);



/**
 * Hide other settings fields
 * Replace "SLUG_OF_SETTINGS_PAGE" with options-writing, options-reading, options-permalink etc.
 * Replace .field-class-name with whatever field you want to hide.
 */

add_action(
	'admin_print_scripts-SLUG_OF_SETTINGS_PAGE.php',
	function () {
		echo '<style>
    .field-class-name
    {
      display: none;
    }
  </style>';
	}
);
