<?php

/**
 * Move Yoast Meta Box to bottom
 */
add_filter(
	'wpseo_metabox_prio',
	function () {
		return 'low';
	},
	10
);



/**
 * Remove Yoast roles
 */
add_action(
	'admin_init',
	function () {
		if ( get_role( 'wpseo_manager' ) ) {
			remove_role( 'wpseo_manager' );
		}

		if ( get_role( 'wpseo_editor' ) ) {
			remove_role( 'wpseo_editor' );
		}
	}
);



/**
 * Removes Yoast SEO comment in head
 * Example: <!-- This site is optimized with the Yoast SEO plugin v14.0.0 - https://yoast.com/wordpress/plugins/seo/ -->
 */
if ( isset( $GLOBALS['wpseo_front'] ) && is_a( $GLOBALS['wpseo_front'], 'WPSEO_Frontend' ) ) {
	remove_action(
		'wpseo_head',
		array(
			$GLOBALS['wpseo_front'],
			'debug_marker',
		),
		2
	);
}



/**
 * Remove Yoast settings from admin bar
 */
add_action(
	'wp_before_admin_bar_render',
	function () {
		global $wp_admin_bar;

		$wp_admin_bar->remove_menu( 'wpseo-menu' );
	},
	999
);



/**
 * Remove Yoast 'primary' categories
 */
add_filter( 'wpseo_primary_term_taxonomies', '__return_empty_array' );



/**
 * Remove Yoast post columns
 */
add_filter(
	'manage_posts_columns',
	function ( $columns ) {
		unset(
			$columns['wpseo-score'],
			$columns['wpseo-title'],
			$columns['wpseo-metadesc'],
			$columns['wpseo-focuskw'],
			$coulmns['wpseo-links']
		);

		return $columns;
	}
);



/**
 * Remove Yoast page columns
 */
add_filter(
	'manage_page_columns',
	function ( $columns ) {
		unset(
			$columns['wpseo-score'],
			$columns['wpseo-title'],
			$columns['wpseo-metadesc'],
			$columns['wpseo-focuskw'],
			$columns['wpseo-links']
		);

		return $columns;
	}
);



/**
 * Remove Yoast metabox on dashboard
 */
add_action(
	'wp_dashboard_setup',
	function () {
		remove_meta_box( 'wpseo-dashboard-overview', 'dashboard', 'side' );
	}
);

