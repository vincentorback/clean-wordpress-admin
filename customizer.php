<?php

/**
 * Disable Customizer
 *
 * @link https://github.com/joppuyo/customizer-disabler
 */

add_action(
	'admin_init',
	function () {
		remove_action( 'plugins_loaded', '_wp_customize_include', 10 );
		remove_action( 'admin_enqueue_scripts', '_wp_customize_loader_settings', 11 );

		add_action(
			'load-customize.php',
			function () {
				wp_die(
					__( 'The Customizer is currently disabled.', 'customizer-disabler' )
				);
			}
		);
	},
	10
);

add_action(
	'init',
	function () {
		add_filter(
			'map_meta_cap',
			function (
				$caps = array(),
				$cap = '',
				$user_id = 0,
				$args = array()
			) {
				if ( $cap == 'customize' ) {
					return array( 'nope' );
				}

				return $caps;
			},
			10,
			4
		);
	},
	10
);
