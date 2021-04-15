<?php

/**
 * Removed post columns
 *
 * @link https://developer.wordpress.org/reference/hooks/manage_posts_columns/
 */
add_action(
	'admin_init',
	function () {

		// Posts
		add_filter(
			'manage_posts_columns',
			function ( $columns ) {
				unset(
					$columns['cb'],
					$columns['title'],
					$columns['author'],
					$columns['categories'],
					$columns['tags'],
					$columns['comments'],
					$columns['date']
				);

				return $columns;
			}
		);

		// Pages
		add_filter(
			'manage_pages_columns',
			function ( $columns ) {
				unset(
					$columns['cb'],
					$columns['title'],
					$columns['author'],
					$columns['comments'],
					$columns['date']
				);

				return $columns;
			}
		);
	}
);

/**
 * Remove bulk actions
 * Change "edit-post" to "edit-<post_type>", "edit-comments", "plugins", "users" or "upload".
 *
 * @link
 */
add_filter(
	'bulk_actions-edit-post',
	function ( $actions ) {
			unset(
				$actions['edit'],
				$actions['trash']
			);

			return $actions;
	}
);
