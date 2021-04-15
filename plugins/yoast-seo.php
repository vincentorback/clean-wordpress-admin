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



/**
 * Remove Yoast presentation items
 * Description, robots, open graph, twitter, etc.
 *
 * @link https://gist.github.com/amboutwe/811e92b11e5277977047d44ea81ee9d4#file-yoast_seo_opengraph_remove_presenters-php
 */
add_filter(
	'wpseo_frontend_presenter_classes',
	function ( $filter ) {
		$presenter_to_remove = array(
			'Yoast\WP\SEO\Presenters\Meta_Description_Presenter',
			'Yoast\WP\SEO\Presenters\Robots_Presenter',
			'Yoast\WP\SEO\Presenters\Canonical_Presenter',

			// Prev next relations
			'Yoast\WP\SEO\Presenters\Rel_Prev_Presenter',
			'Yoast\WP\SEO\Presenters\Rel_Next_Presenter',

			// Open Graph
			'Yoast\WP\SEO\Presenters\Open_Graph\Locale_Presenter',
			'Yoast\WP\SEO\Presenters\Open_Graph\Type_Presenter',
			'Yoast\WP\SEO\Presenters\Open_Graph\Title_Presenter',
			'Yoast\WP\SEO\Presenters\Open_Graph\Description_Presenter',
			'Yoast\WP\SEO\Presenters\Open_Graph\Url_Presenter',
			'Yoast\WP\SEO\Presenters\Open_Graph\Site_Name_Presenter',
			'Yoast\WP\SEO\Presenters\Open_Graph\Article_Publisher_Presenter',
			'Yoast\WP\SEO\Presenters\Open_Graph\Article_Author_Presenter',
			'Yoast\WP\SEO\Presenters\Open_Graph\Article_Published_Time_Presenter',
			'Yoast\WP\SEO\Presenters\Open_Graph\Article_Modified_Time_Presenter',
			'Yoast\WP\SEO\Presenters\Open_Graph\Image_Presenter',

			// Twitter
			'Yoast\WP\SEO\Presenters\Twitter\Card_Presenter',
			'Yoast\WP\SEO\Presenters\Twitter\Title_Presenter',
			'Yoast\WP\SEO\Presenters\Twitter\Description_Presenter',
			'Yoast\WP\SEO\Presenters\Twitter\Image_Presenter',
			'Yoast\WP\SEO\Presenters\Twitter\Creator_Presenter',
			'Yoast\WP\SEO\Presenters\Twitter\Site_Presenter',
		);

		foreach ( $presenter_to_remove as $presenter ) {
			if ( ( $key = array_search( $presenter, $filter ) ) !== false ) {
				unset( $filter[ $key ] );
			}
		}

		return $filter;
	}
);
